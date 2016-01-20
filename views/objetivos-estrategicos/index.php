<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ObjetivosEstrategicosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Objetivos Estrategicos';
$this->params['breadcrumbs'][] = ['label' => 'Configuración', 'url' => ['site/configuracion']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="objetivos-estrategicos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Objetivos Estrategicos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'objetivo_estrategico:ntext',
            'objetivo_nacional',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
