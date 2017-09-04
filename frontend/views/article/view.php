<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\HtmlPurifier;
use frontend\widgets\sidebarwidget;
/* @var $this yii\web\View */
/* @var $model common\models\Article */

$this->title = $model->title;


if(isset($model->category_id)){
    $this->params['breadcrumbs'][] = ['label' => \common\models\Category::findOne($model->category_id)['name'], 'url' => '../?ArticleSearch[category_id]='.$model->category_id];
}else{
    $this->params['breadcrumbs'][] = '文章列表';
}

//$this->params['breadcrumbs'][] = ['label' => 'article', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="col-md-9 fix left" style="    border-top: 2px solid #FC5185;">


        <div class="page-title">


            <h2><?= Html::encode($model->title) ?></h2>
            <span class="fh5co-post-date"> <span class="glyphicon glyphicon-time"></span><?= date('Y-m-d',$model->addtime) ?></span>

        </div>
        <div class="page-post">
                <?= HtmlPurifier::process($model->content) ?>
        </div>



<div class="fh5co-navigation">
    <div class="fh5co-cover prev fh5co-cover-sm">
        <div class="overlay"></div>
        <a class="copy" href=" <?php if($prev){?><?= Yii::$app->urlManager->createUrl(['article/view','id'=>$prev->id]);?><?php }else{ echo "#";} ?>">
            <div class="display-t">
                <div class="display-tc">
                    <div>
                        <span>上一篇</span>
                        <h2> <?php if($prev){ echo $prev->title;}else{ echo "暂无";} ?></h2>
                    </div>
                </div>
            </div>
        </a>

    </div>
    <div class="fh5co-cover next fh5co-cover-sm" style="background: #fc5185;">
        <a class="copy" href="<?php if($next){?><?=Yii::$app->urlManager->createUrl(['article/view','id'=>$next->id]);?><?php }else{ echo "#";} ?>">
            <div class="display-t">
                <div class="display-tc">
                    <div>
                        <span>下一篇</span>
                        <h2> <?php if($next){  echo $next->title;  }else{ echo "暂无";} ?></h2>
                    </div>
                </div>
            </div>
        </a>

    </div>
</div>
</div>

<div class="col-md-3 ">
    <?=SidebarWidget::Widget()?>
</div>
