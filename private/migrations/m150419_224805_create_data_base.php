<?php

use yii\db\Schema;
use yii\db\Migration;

class m150419_224805_create_data_base extends Migration
{
    public function up()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        };

        $this->createTable('vendor',[
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING,
            'name_search' => Schema::TYPE_STRING,
        ],$tableOptions);

        $this->createTable('model',[
            'id' => Schema::TYPE_PK,
            'vendor_id' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING,
            'name_search' => Schema::TYPE_STRING,
        ],$tableOptions);

        $this->createTable('complectation',[
            'id' => Schema::TYPE_PK,
            'model_id' => Schema::TYPE_INTEGER,
            'name' => Schema::TYPE_STRING,
            'name_search' => Schema::TYPE_STRING,
            'description' => Schema::TYPE_TEXT,
        ],$tableOptions);

        $this->createTable('orders',[
            'id' => Schema::TYPE_PK,
            'vendor_id' => Schema::TYPE_INTEGER,
            'model_id' => Schema::TYPE_INTEGER,
            'complectation_id' => Schema::TYPE_INTEGER,
            'price' => Schema::TYPE_INTEGER,
            'description' => Schema::TYPE_TEXT,
            'main_img' => Schema::TYPE_TEXT,
            'other_img' => Schema::TYPE_TEXT,
            'comments' => Schema::TYPE_TEXT,
        ],$tableOptions);

    }

    public function down()
    {
        echo "m150419_224805_create_data_base cannot be reverted.\n";

        $this->dropTable('vendor');
        $this->dropTable('model');
        $this->dropTable('complectation');
        $this->dropTable('orders');

        return false;
    }

}
