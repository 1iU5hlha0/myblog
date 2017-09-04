<?php
namespace frontend\widgets\sidebar;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Article;
use yii\db;

class SidebarWidget extends Widget
{
    public $SidebarWidget;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        //Article::find()->joinWith(['category'])->select('article.*,category.*')->asArray()->all();
        //AR活动记录方式查询
        //$category=Category::find()->joinWith(['articles'])->select('category.*,count(article.id) as count')->groupBy('category.id')->asArray()->all();
        //查询构建器方式查询
        $category=(new \yii\db\Query())->from('category a')->leftJoin('article b','a.id=b.category_id')->select('a.*,count(b.id) as count')->groupBy('a.id')->all();
       // $category=ArrayHelper::map($category,'name','count','id');

        return $this->render('_sidebar', [
            'cat'=>$category,
        ]);
    }
}
?>