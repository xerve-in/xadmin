<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CategoryPathMaps */

$this->title = $model->seller;
$this->params['breadcrumbs'][] = ['label' => 'Category Path Maps', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-path-maps-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'seller' => $model->seller, 's_cat_path' => $model->s_cat_path], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'seller' => $model->seller, 's_cat_path' => $model->s_cat_path], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'seller',
            's_cat_path',
            'u_seller',
            'x_cat',
            'x_subcat',
            'x_type',
            'updated_dt',
            'x_cat_id',
            'x_subcat_id',
            'x_type_id',
        ],
    ]) ?>

</div>
