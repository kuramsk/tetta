<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="col-lg-12">
    <div class="col-lg-12">
        <div class="select-wrap">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 select select-active">
                1. <a id="vendors-a" role="button" data-toggle="dropdown" href="#">Выберите марку </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 select select-inactive">
                2. <a id="models-a" role="button">Выберите модель </a>
                </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 select select-inactive">
                3. <a id="complectations-a" role="button">Выберите комплектацию </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 select select-inactive">
                4. <a id="search-a" role="button">Показать все варианты</a>
            </div>
        </div>
    </div>
    <div class="orders-list">
    <?php foreach($orders as $order):?>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 pb30" car-id="<?=$order['id']?>">
        <a href="/orders/<?=$order['id']?>">
        <div class="car-offer" style="background: url(<?=$order['main_img']?>) center no-repeat; background-size: cover;">
            <div class="car-offer-caption text-right">Продаётся <?=$order['vendor_id']?> <?=$order['model_id']?></div>
            <div class="car-offer-price text-right"><?=$order['price']?> руб.</div>
            <div class="car-offer-description text-right"><?=$order['description']?></div>
        </div>
        </a>
    </div>
    <?php endforeach; ?>
    </div>
</div>