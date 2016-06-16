<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MasterCategories */

$this->title = 'Create Master Categories';
$this->params['breadcrumbs'][] = ['label' => 'Master Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="master-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
