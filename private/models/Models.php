<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property integer $id
 * @property integer $vendor_id
 * @property string $name
 */
class Models extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'model';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vendor_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['name_search'], 'string', 'max' => 255]
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
            'name' => 'Name',
            'name_search' => 'Name Search'
        ];
    }
}
