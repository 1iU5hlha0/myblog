<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\data\ActiveDataProvider;
use frontend\widgets\sidebar\SidebarWidget;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = '首页';
if(isset($_GET['ArticleSearch']['category_id'])){
    $this->params['breadcrumbs'][] = \common\models\Category::findOne($_GET['ArticleSearch']['category_id'])['name'];
}else{
    $this->params['breadcrumbs'][] = '文章列表';
}
?>


        <div class="col-md-9 animated fadeInLeft">

            <?= ListView::widget([
                'id'=>'articleList',
                'dataProvider' => $dataProvider,
                'itemView'=>'_listitem',//子视图，用来规定列表样式
                'layout'=>'<div class="left">{items}</div><div style="text-align: center;">{pager}</div>',
                'pager'=>[
                    'maxButtonCount'=>'10',
                    'nextPageLabel'=>Yii::t('app','>'),
                    'prevPageLabel'=>Yii::t('app','<'),
                   // 'options' => ['class' => 'newpager'],
                ],
            ]); ?>

        </div>
        <div class="col-md-3 animated fadeInRight">
            <?=SidebarWidget::Widget()?>
        </div>


