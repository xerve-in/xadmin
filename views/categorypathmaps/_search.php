<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryPathMapsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-path-maps-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'seller') ?>

    <?= $form->field($model, 's_cat_path') ?>

    <?= $form->field($model, 'u_seller') ?>

    <?= $form->field($model, 'x_cat') ?>

    <?= $form->field($model, 'x_subcat') ?>

    <?php // echo $form->field($model, 'x_type') ?>

    <?php // echo $form->field($model, 'updated_dt') ?>

    <?php // echo $form->field($model, 'x_cat_id') ?>

    <?php // echo $form->field($model, 'x_subcat_id') ?>

    <?php // echo $form->field($model, 'x_type_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
