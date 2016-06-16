<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\CategoryPathMaps */

$this->title = 'Create Category Path Maps';
$this->params['breadcrumbs'][] = ['label' => 'Category Path Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-path-maps-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
