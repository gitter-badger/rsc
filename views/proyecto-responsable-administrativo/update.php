<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoResponsableAdministrativo */

$this->title = 'Update Proyecto Responsable Administrativo: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Proyecto Responsable Administrativos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proyecto-responsable-administrativo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>