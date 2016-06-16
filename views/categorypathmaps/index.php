<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoryPathMapsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Seller Category Path Maps';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-path-maps-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php // Html::a('Create Category Path Maps', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'seller',
            's_cat_path',
            //'u_seller',
            //'x_cat',
            //'x_subcat',
            //'x_type',
            // 'updated_dt',
            ['attribute'=>'x_cat_id', 'value'=>'xCat.category_name'],
            ['attribute'=>'x_subcat_id', 'value'=>'xSubcat.category_name'],
            ['attribute'=>'x_type_id', 'value'=>'xType.category_name'],

            ['class' => 'yii\grid\ActionColumn','template' => '{update}', ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
