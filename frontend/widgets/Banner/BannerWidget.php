<?php
namespace frontend\widgets\Banner;

use yii\base\Widget;
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use common\models\Category;
use common\models\Article;
use yii\db;

class BannerWidget extends Widget
{
    public $BannerWidget;

    public function init()
    {
        $this->
        parent::init();
    }

    public function run()
    {
        return $this->render('_banner');
    }
}
?>