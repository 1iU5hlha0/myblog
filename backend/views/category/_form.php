<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\category;
use yii\helpers\arrayhelper;
use common\components\Helper;
/* @var $this yii\web\View */
/* @var $model common\models\Category */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-form">

    <?php $form = ActiveForm::begin(); ?>



    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>


    <?= $form->field($model, 'parent_id')->dropDownList($list)?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '增加' : '更改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
