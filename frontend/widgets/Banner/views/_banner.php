<?php
use yii\helpers\Html;
use yii\helpers\HtmlPurifier;
?>
<li class="widget right">
    <h3 class="widget-head">搜索</h3>
    <div class="widget-content">
        <form id="w1" action="<?=Yii::getAlias("@web")?>" method="get" data-pjax="">
            <div class="fl">
                <input type="text" id="articlesearch-title" class="txt-box" name="ArticleSearch[title]" placeholder="请搜索..">
            </div>
            <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i></button>
        </form>
    </div>
</li>

<li class="widget right">
    <h3 class="widget-head">文章分类</h3>
    <div class="widget-content">
        <ul class="list list-ok alt">

            <?php foreach($cat as $key=>$v){?>
                <li><a href="<?=Yii::getAlias("@web")?>?ArticleSearch[category_id]=<?=$v['id']?>"><?=$v['name']?></a><span class="fr">[<?=$v['count']?>]</span></li>
            <?php };?>
        </ul>
    </div>
</li>