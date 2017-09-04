<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除这篇文章吗?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            //'category_id',
            ['attribute'=>'category_id',
            'value'=>$model->category->name,
            ],
            ['label'=>'所属分类',
               'value'=>$model->category->name,
            ],
            'title',
            'keyword',
            'content:ntext',
            'writer',
            [
                'attribute'=>'addtime',
                'value'=>date('Y-m-d H:i:s',$model->addtime)
            ],
            [
                'attribute'=>'uptime',
                'value'=>date('Y-m-d H:i:s',$model->uptime)
            ]
        ],
    ]) ?>

</div>
