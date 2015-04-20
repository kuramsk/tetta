<?php

namespace app\controllers;

use app\models\Complectation;
use app\models\Orders;
use app\models\Vendor;
use Yii;
use app\models\Models;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
    public function actionCatalog($vendor = '', $model = '', $complectation = ''){

        if(($vendor == '') && ($model == '') && ($complectation == '')){
            $orders = Orders::find()->all();
        }else{
            if($vendor != ''){
                if($model != ''){
                    if($complectation != ''){
                        $vendor = Vendor::find()->where(['name_search' => $vendor])->one()['id'];
                        $model = Models::find()->where(['name_search' => $model])->one()['id'];
                        $complectation = Complectation::find()->where(['name_search' => $complectation])->one()['id'];
                        $orders = Orders::find()->where(['vendor_id' => $vendor, 'model_id' => $model, 'complectation_id' => $complectation])->all();
                    }else{
                        $vendor = Vendor::find()->where(['name_search' => $vendor])->one()['id'];
                        $model = Models::find()->where(['name_search' => $model])->one()['id'];
                        $orders = Orders::find()->where(['vendor_id' => $vendor, 'model_id' => $model])->all();
                    }
                }else{
                    {
                        $vendor = Vendor::find()->where(['name_search' => $vendor])->one()['id'];
                        $orders = Orders::find()->where(['vendor_id' => $vendor])->all();
                    }
                }
            }else{
                $orders = Orders::find()->all();
            }
        }
        foreach($orders as &$order){
            $order['vendor_id'] = Vendor::find()->where(['id' => $order['vendor_id']])->one()['name'];
            $order['model_id'] = Models::find()->where(['id' => $order['model_id']])->one()['name'];
        }
        return $this->render('catalog',['orders' => $orders]);
    }

    private function prepare($el){
        $replace = [' ','.',','];
        return mb_strtolower(str_replace($replace, '', $el));
    }
    public function actionCarView($vendor = '', $model = '', $complectation = '', $id = ''){

        $db_vendor = Vendor::find()->where(['name_search' => $vendor])->one();
        $db_model = Models::find()->where(['name_search' => $model])->one();
        $db_complectation = Complectation::find()->where(['name_search' => $complectation])->one();
        $offer = Orders::find()->where(['id'=>$id])->one();

        return $this->render('car-view',[
                'vendor' => $db_vendor,
                'model' => $db_model,
                'complectation' => $db_complectation,
                'order' => $offer
            ]
        );
    }

}
