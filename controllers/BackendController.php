<?php

namespace app\controllers;

use Yii;
use app\models\TblproductImages;
use app\models\Tblproducts;
use app\models\TblproductsSearch;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * BackendController implements the CRUD actions for Tblproducts model.
 */
class BackendController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Tblproducts models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblproductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Tblproducts model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblproducts();
        $model_images = new TblproductImages();

        if ($model->load(Yii::$app->request->post())) {
            $data = Yii::$app->request->post('Tblproducts');

            $model->product_name = trim($data['product_name']);
            $model->product_price = trim($data['product_price']);
            $model->insert_by = 'admin';

            if ($model->save(false)) {
                $model_images->image_name = UploadedFile::getInstances($model_images, 'image_name');

                if ($model_images->image_name) {
                    foreach ($model_images->image_name as $image) {
                        $filename = $image->baseName.'_'.time() .'.' . $image->extension;
                        $image->saveAs('uploads/' . $filename); // image saved to folder
                        $model_images = new TblproductImages();
                        $model_images->product_id = $model->id;
                        $model_images->image_name = $filename;
                        $model_images->image_path = 'uploads/'.$filename;
                        $model_images->insert_by = 'admin';
                        $model_images->save(false);
                    }
                }
            }

            Yii::$app->session->setFlash('success', "Product added successfully");
            return $this->redirect(['create']);
        }

        return $this->render('create', [
            'model' => $model,
            'model_images' => $model_images,
        ]);
    }
    
}
