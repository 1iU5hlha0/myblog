<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

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
<div class="fh5co-loader" ></div>

<?php
NavBar::begin([
    'brandLabel' => 'QQ空间',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse animated fadeInDown',
    ],
]);
$menuItemsLeft = [
    ['label' => '首页', 'url' => ['/article/index']],
    ['label' => '分类', 'url' => ['/site/category']],
   // ['label' => '关于', 'url' => ['/site/about']],
  //  ['label' => '联系我们', 'url' => ['/site/contact']],
];
if (Yii::$app->user->isGuest) {
    $menuItemsRight[] = ['label' => '注册', 'url' => ['/site/signup']];
    $menuItemsRight[] = ['label' => '登录', 'url' => ['/site/login']];
} else {
    $menuItemsRight[] = [
        'label'=>'【'.Yii::$app->user->identity->username.'】',
        'linkOptions'=>['class'=>'btn btn-link logout'],
        'items'=>[
            [
                'label'=>'退出',
                'url'=>['/site/logout'],
                'linkOptions'=>['data-method'=>'post']
            ]
        ]
    ];
    /*'<li>'
        . Html::beginForm(['/site/logout'], 'post')
        . Html::submitButton(
            'Logout (' . Yii::$app->user->identity->username . ')',
            ['class' => 'btn btn-link logout']
        )
        . Html::endForm()
        . '</li>';
    */
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-left'],
    'items' => $menuItemsLeft,
]);
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItemsRight,
]);
NavBar::end();
?>


    <div class="page_breadcrumb animated fadeIn">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
    </div>
        <?= Alert::widget() ?>
    <div id="page">
        <?= $content ?>
    </div>
        <footer>
            <div>
                &copy; My Company <?= date('Y') ?><?= Yii::powered() ?>
            </div>
        </footer>

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up"></i></a>
</div>
<!--
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
-->
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
