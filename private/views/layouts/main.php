<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

/* @var $this \yii\web\View */
/* @var $content string */

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <?php $this->head() ?>
</head>

<body>
<?php $this->beginBody() ?>
    <div class="wrap">
        <div class="container container-bg">
                <div class="row">
                    <div class="col-md-12 visible-md visible-lg">
                        <div id="carousel-example-generic" class="carousel slide carousel-head" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner">
                                <div class="item absolute-center active" style="height: 300px; background: url(/images/carusel-img-0.jpg) center 100% no-repeat"></div>
                                <div class="item absolute-center" style="height: 300px; background: url(/images/carusel-img-1.jpg) center 100% no-repeat"></div>
                                <div class="item absolute-center" style="height: 300px; background: url(/images/carusel-img-2.jpg) center 100% no-repeat"></div>
                            </div>

                            <!-- Controls -->
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>
                </div>
            <?php
                NavBar::begin([
                    'options' => [
                        'class' => 'navbar-modified',
                    ],
                ]);
                echo Nav::widget([
                    'options' => ['class' => 'navbar-nav navbar-left'],
                    'items' => [
                        ['label' => 'Главная', 'url' => ['/site/index']],
                        ['label' => 'Каталог', 'url' => ['/site/catalog']],
                        ['label' => 'О сайте', 'url' => ['/site/about']]
                    ],
                ]);
                NavBar::end();
            ?>
            <div class="container">
                <div class="row">

                <?= $content ?>
                </div>
            </div>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Frank Howdy <?= date('Y') ?></p>
            <p class="pull-right"><?= Yii::powered() ?></p>
        </div>
    </footer>

<?php $this->endBody() ?>
<script src="/js/script.js"></script>

</body>
</html>
<?php $this->endPage() ?>
