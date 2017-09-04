<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<div class="fh5co-entry padding">


        <div>
            <span class="fh5co-post-date"> <span class="glyphicon glyphicon-time"></span> <?= date('Y-m-d',$model->addtime) ?></span>
            <h2><a href="<?=$model->url;?>"> <?= Html::encode($model->title) ?></a></h2>
            <p> <?= $model->Beginning?></p>
        </div>
</div>