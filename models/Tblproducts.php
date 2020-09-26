<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblproducts".
 *
 * @property int $id
 * @property string $product_name
 * @property float $product_price
 * @property string $insert_date
 * @property string $insert_by
 * @property string $update_date
 * @property string $update_by
 * @property int $status
 *
 * @property Tblcart[] $tblcarts
 * @property TblproductImages[] $tblproductImages
 */
class Tblproducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblproducts';
    }

    /**
     * {@inheritdoc}
     */
    public $image_path;

    public function rules()
    {
        return [
            [['product_name', 'product_price'], 'required'],
            [['product_price'], 'number'],
            [['insert_date', 'update_date','image_path'], 'safe'],
            [['status'], 'integer'],
            [['product_name', 'insert_by', 'update_by'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'product_price' => 'Product Price',
            'insert_date' => 'Insert Date',
            'insert_by' => 'Insert By',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Tblcarts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblcarts()
    {
        return $this->hasMany(Tblcart::className(), ['product_id' => 'id']);
    }

    /**
     * Gets query for [[TblproductImages]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblproductImages()
    {
        return $this->hasMany(TblproductImages::className(), ['product_id' => 'id']);
    }
}
