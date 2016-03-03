<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset; 
use johnitvn\ajaxcrud\BulkButtonWidget;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProyectoAccionEspecificaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyecto Accion Especificas';
$this->params['breadcrumbs'][] = $this->title;

//Iconos
$icons=[
    'nuevo'=>'<span class="glyphicon glyphicon-file" aria-hidden="true"></span>',
    'crear'=>'<span class="glyphicon glyphicon-plus" aria-hidden="true"></span>',
    'editar'=>'<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>',
    'eliminar'=>'<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>',
];

CrudAsset::register($this);

?>
<div class="proyecto-accion-especifica-index">
    <?=GridView::widget([
        'id'=>'especifica',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'pjax'=>true,
        'pjaxSettings' => [
            'options' => [
                'id' => 'especifica-pjax',
            ],
        ],
        'columns' => require(__DIR__.'/_columns.php'),
        'toolbar'=> [
            ['content'=>
                Html::a($icons['nuevo'].' Nuevo', ['create','proyecto'=>$searchModel->id_proyecto],
                ['role'=>'modal-remote','title'=> 'Crear Acción Específica','class'=>'btn btn-success']).
                Html::a('<i class="glyphicon glyphicon-repeat"></i> Recargar', [''],
                ['data-pjax'=>1, 'class'=>'btn btn-default', 'title'=>'Reset Grid']).                
                '{toggleData}'.
                '{export}'
            ],
        ],            
        'striped' => true,
        'condensed' => true,
        'responsive' => true,          
        'panel' => [
            'type' => 'primary', 
            'heading' => '<i class="glyphicon glyphicon-list"></i> Acciones Específicas',
            'before'=>'<em>* Resize table columns just like a spreadsheet by dragging the column edges.</em>',
            'after'=>BulkButtonWidget::widget([
                        'buttons'=>Html::a('<i class="glyphicon glyphicon-trash"></i>&nbsp; Delete All',
                            ["bulk-delete"] ,
                            [
                                "class"=>"btn btn-danger btn-xs",
                                'role'=>'modal-remote-bulk',
                                'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                                'data-request-method'=>'post',
                                'data-confirm-title'=>'Are you sure?',
                                'data-confirm-message'=>'Are you sure want to delete this item'
                            ]),
                    ]).                        
                    '<div class="clearfix"></div>',
        ]
    ])?>
</div>