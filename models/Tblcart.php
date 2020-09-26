<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tblcart".
 *
 * @property int $id
 * @property int $product_id
 * @property int $user_id
 * @property int $quantity
 * @property string $insert_date
 * @property string|null $insert_by
 * @property string $update_date
 * @property string|null $update_by
 * @property int $status
 *
 * @property Tblproducts $product
 */
class Tblcart extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tblcart';
    }

    /**
     * {@inheritdoc}
     */
    public $products;
    
    public function rules()
    {
        return [
            [['product_id', 'user_id', 'quantity'], 'required'],
            [['product_id', 'user_id', 'quantity'], 'integer'],
            [['insert_date', 'update_date','products'], 'safe'],
            [['insert_by', 'update_by'], 'string', 'max' => 100],
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
            'user_id' => 'User ID',
            'quantity' => 'Quantity',
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
