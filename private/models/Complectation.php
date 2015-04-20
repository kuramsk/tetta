<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "complectation".
 *
 * @property integer $id
 * @property integer $model_id
 * @property string $name
 * @property string $description
 */
class Complectation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'complectation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id'], 'integer'],
            [['description'], 'string'],
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
            'model_id' => 'Model ID',
            'name' => 'Name',
            'description' => 'Description',
            'name_search' => 'Name Search'
        ];
    }
}
