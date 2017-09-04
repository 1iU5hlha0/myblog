<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers;
use common\components\helper;
use common\models\category;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '文章管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加文章', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           // ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute'=>'category_id',
             'value'=>'category.name',
                'filter'=>Category::find()->select(['name','id'])->indexBy('id')->column()
            ],
            'title',
            'keyword',
            ['attribute'=>'content','value'=>function($data){
                return helper::truncate_utf8_string($data->content,10);
            }],
            'writer',
            ['attribute'=>'addtime',
             'format'=>['date','php:Y-m-d H:i:s']
            ],
            ['attribute'=>'uptime',
                'format'=>['date','php:Y-m-d H:i:s']
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
