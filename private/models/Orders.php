<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "orders".
 *
 * @property integer $id
 * @property integer $vendor_id
 * @property integer $model_id
 * @property integer $complectation_id
 * @property integer $price
 * @property string $description
 * @property string $main_img
 * @property string $other_img
 * @property string $comments
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_id', 'model_id', 'complectation_id', 'price'], 'integer'],
            [['description', 'main_img', 'other_img', 'comments'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vendor_id' => 'Vendor ID',
            'model_id' => 'Model ID',
            'complectation_id' => 'Complectation ID',
            'price' => 'Price',
            'description' => 'Description',
            'main_img' => 'Main Img',
            'other_img' => 'Other Img',
            'comments' => 'Comments',
        ];
    }
}
