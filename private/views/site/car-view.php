<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Каталог';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="col-lg-12" style="margin-bottom: 30px; padding:0 30px;">
    <div class="col-lg-4 col-md-4 col-sm-4" style="height:300px; background: url(<?=$order['main_img']?>) center no-repeat; background-size: cover;"></div>
    <div class="col-lg-8 col-md-8 col-sm-8">
        <table class="table">
            <tr>
                <td class="col-lg-3 col-md-3 col-sm-3">Марка:</td><td class="col-lg-9 col-md-9 col-sm-9"><?=$vendor['name']?></td>
            </tr>
            <tr>
                <td class="col-lg-3 col-md-3 col-sm-3">Модель:</td><td class="col-lg-9 col-md-9 col-sm-9"><?=$model['name']?></td>
            </tr>
            <tr>
                <td class="col-lg-3 col-md-3 col-sm-3">Комплектация:</td class="col-lg-9 col-md-9 col-sm-9"><td><?=$complectation['name']?>, <?=$complectation['description']?></td>
            </tr>
            <tr>
                <td class="col-lg-3 col-md-3 col-sm-3">Стоимость:</td><td class="col-lg-9 col-md-9 col-sm-9"><?=$order['price']?> рублей.</td>
            </tr>
            <tr>
                <td class="col-lg-3 col-md-3 col-sm-3">Описание:</td><td class="col-lg-9 col-md-9 col-sm-9"><?=$order['description']?></td>
            </tr>
            <tr>
                <td class="col-lg-3 col-md-3 col-sm-3">Комментарий:</td><td class="col-lg-9 col-md-9 col-sm-9"><?=$order['comments']?></td>
            </tr>
        </table>
    </div>

</div>