<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Se */
?>
<div class="se-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'especifica',
            'sub_especifica',
            'nombre',
            'estatus',
        ],
    ]) ?>

</div>
