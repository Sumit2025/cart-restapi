<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblproduct_images".
 *
 * @property int $id
 * @property int $product_id
 * @property string $image_name
 * @property string $image_path
 * @property string $insert_date
 * @property string|null $insert_by
 * @property string $update_date
 * @property string|null $update_by
 * @property int $status
 *
 * @property Tblproducts $product
 */
class TblproductImages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblproduct_images';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'image_name', 'image_path'], 'required'],
            [['product_id', 'status'], 'integer'],
            [['insert_date', 'update_date'], 'safe'],
            [['image_name'],'image','extensions' => 'jpg,jpeg,png','maxFiles' => 8],
            [['image_path', 'insert_by', 'update_by'], 'string', 'max' => 100],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tblproducts::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'image_name' => 'Upload Images',
            'image_path' => 'Image Path',
            'insert_date' => 'Insert Date',
            'insert_by' => 'Insert By',
            'update_date' => 'Update Date',
            'update_by' => 'Update By',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Tblproducts::className(), ['id' => 'product_id']);
    }
}
