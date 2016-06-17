<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

use app\models\MasterCategories;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\CategoryPathMaps */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="category-path-maps-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'seller')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?= $form->field($model, 's_cat_path')->textInput(['maxlength' => true,'readonly'=>true]) ?>

    <?php //$form->field($model, 'u_seller')->textInput(['maxlength' => true]) ?>
    <Table width="100%">
        <tr>
            <td width="40%">
                <?= $form->field($model, 'x_cat_id')->dropDownList(app\models\MasterCategories::find()->select(['category_name', 'id'])->where(['parent_id'=>NULL,'cat_type'=>1,'deleted_flag'=>0])->orderBy('category_name')->indexBy('id')->column(),
    ['prompt'=>'Select Category',
        'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('mastercategories/lists?id=').'"+$(this).val(), function(data) {
                  $( "select#x_subcat" ).html( data ); $( "select#x_type" ).html( "<option value=\"\">Select</option>" );
                });
            ']); ?>
            </td>
            <td width="30%">
                <?php
     $dataPost= ArrayHelper::map(app\models\MasterCategories::find()->where(['parent_id'=>($model->xCat=="" ? 0 : $model->xCat)])->asArray()->all(), 'id', 'category_name');
    echo $form->field($model, 'x_subcat_id')
        ->dropDownList(
            $dataPost,           
            ['id'=>'x_subcat','prompt'=>'Select', 'onchange'=>'
                $.post( "'.Yii::$app->urlManager->createUrl('mastercategories/lists?id=').'"+$(this).val(), function(data) {
                  $( "select#x_type" ).html( data );
                });
            ']);
?>
            </td>
            <td width="30%">
                <?php
     $dataPost= $dataPost= ArrayHelper::map(app\models\MasterCategories::find()->where(['parent_id'=>($model->xSubcat=="" ? 0 : $model->xSubcat)])->asArray()->all(), 'id', 'category_name');
    echo $form->field($model, 'x_type_id')
        ->dropDownList(
            $dataPost,           
            ['id'=>'x_type','prompt'=>'Select']);
?>
            </td>
            
        </tr>
        
    </Table>
    

    <?php //$form->field($model, 'x_subcat')->textInput(['maxlength' => true]) ?>

    <?php //$form->field($model, 'x_type')->textInput(['maxlength' => true]) ?>
     
    <br><br>
    <center>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </center>
    <?php ActiveForm::end(); ?>

</div>
