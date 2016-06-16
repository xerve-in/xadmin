<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryPathMaps */

$this->title = 'Update Category Path Maps: ' . $model->seller;
$this->params['breadcrumbs'][] = ['label' => 'Category Path Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->seller, 'url' => ['view', 'seller' => $model->seller, 's_cat_path' => $model->s_cat_path]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="category-path-maps-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
