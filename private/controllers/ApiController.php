<?php

namespace app\controllers;

use app\models\Complectation;
use app\models\Models;
use app\models\Orders;
use app\models\Vendor;

class ApiController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function  actionGetVendorsList(){

        $vendors = Vendor::find()->all();
        $vendorsArray = array();
        foreach($vendors as $vendor){
            $vendorsArray[] = $vendor->toArray();
        }
        print_r(json_encode($vendorsArray));
    }
    public function  actionGetModelsList(){
        if(isset($_POST['vendor_id'])){
            $models = Models::find()->where(['vendor_id' => $_POST['vendor_id']])->all();
            $modelsArray = array();
            foreach($models as $model){
                $modelsArray[] = $model->toArray();
            }
            print_r(json_encode($modelsArray));
        }
    }
    public function  actionGetComplectationsList(){
        if(isset($_POST['model_id'])){
            $complectations = Complectation::find()->where(['model_id' => $_POST['model_id']])->all();
            $complectationsArray = array();
            foreach($complectations as $complectation){
                $complectationsArray[] = $complectation->toArray();
            }
            print_r(json_encode($complectationsArray));
        }
    }

    public function  actionGetOrdersList(){
        if(isset($_POST['complectation_id'])){
            $orders = Orders::find()->where(['complectation_id' => $_POST['complectation_id']])->all();

            $ordersArray = array();
            foreach($orders as $order){
                $addorder = $order->toArray();
                $addorder['vendor_id'] = Vendor::find()->where(['id' => $addorder['vendor_id']])->one()['name'];
                $addorder['model_id'] = Models::find()->where(['id' => $addorder['model_id']])->one()['name'];
                $ordersArray[] = $addorder;
            }
            print_r(json_encode($ordersArray));
        }
    }

}
