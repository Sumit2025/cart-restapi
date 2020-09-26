<?php

namespace app\controllers;

use Yii;
use app\models\Tblcart;
use app\models\TblproductImages;
use app\models\Tblproducts;
use yii\base\Exception;
use yii\filters\VerbFilter;
use yii\helpers\Url;


class ApiController extends BaseController
{
	public function actionListproducts()
	{
		$requestMethod = Yii::$app->request->getMethod();
		if ($requestMethod != 'GET') {
			return $this->apiValidate("Invalid request method");
		}

		$data = [];
		$prod_data = Tblproducts::find()->select('id, product_name, product_price')->asArray()->all();

		if (!empty($prod_data)) {
			foreach ($prod_data as $key => $value) {
				$data[$key] = $value;
				$prod_images = TblproductImages::find()->select('image_path')->where(['product_id'=> $value['id']])->asArray()->all();
				
				$imgdata = [];
				if (!empty($prod_images)) {
					foreach ($prod_images as $imageVal) {
						$imgdata[] = Url::base(true).'/'.$imageVal['image_path'];
					}
				}
				$data[$key]['image_path'] = $imgdata;
			}
		}
		return $this->apiItem($data);
	}

	public function actionAddtocart()
	{
		$requestMethod = Yii::$app->request->getMethod();
		if ($requestMethod != 'POST') {
			return $this->apiValidate("Invalid request method");
		}

		$model = new Tblcart();
		$request['Tblcart'] = Yii::$app->request->post();

		if($model->load($request)) {
			$post = $request['Tblcart'];

			foreach ($post['products'] as $key => $value) {
				if (!empty($post['user_id']) && !empty($value['product_id']) && !empty($value['quantity'])) {
					$exists = Tblcart::find()
					->where(['user_id'=> $post['user_id']])
					->andWhere(['product_id'=>$value['product_id']])
					->exists();

					if (empty($exists)) { //insert
						$model = new Tblcart();
						$model->product_id = $value['product_id'];
						$model->user_id = $post['user_id'];
						$model->quantity = $value['quantity'];
						$model->insert_by = 'admin';
						if($model->save(false)){
							$message = "Product added to cart";
						}
					} else { //update
						$model = Tblcart::find()
						->where(['user_id'=>$post['user_id']])
						->andWhere(['product_id'=>$value['product_id']])
						->one();

						$model->product_id = $value['product_id'];
						$model->user_id = $post['user_id'];
						$model->quantity = $value['quantity'];
						$model->insert_by = 'admin';
						$model->save(false);
						$message = "Product updated in cart";
					}
				} else {
					return $this->apiValidate("Required fields missing");
				}				
			}
			return $this->apiItem([],$message);	

		} else {
			return $this->apiValidate($model->errors);
		}
	}

	public function actionGetcartitems($userid)
	{
		$requestMethod = Yii::$app->request->getMethod();
		if ($requestMethod != 'GET') {
			return $this->apiValidate("Invalid request method");
		}

		$model = Tblcart::find()
				->select('id, product_id, user_id, quantity')
				->where(['user_id'=> $userid])
				->all();

		return $this->apiItem($model);
	}
}

