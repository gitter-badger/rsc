<?php
	use yii\web\Html;
	use yii\web\Url;

	/*
	 * Items del menu principal
	 */

	return [
            ['label' => $icons['inicio'].' Inicio', 'url' => ['/site/index']],
            ['label' => $icons['pedido'].' Requerimientos', 'items' =>[
                ['label' => $icons['proyecto'].' Proyecto', 'url' => ['/proyecto-pedido/index']],
                ['label' => $icons['acc'].' Acción Centralizada', 'url' => ['/accion-centralizada-pedido/index']],
            ]],            
            ['label' => $icons['proyecto'].' Proyecto', 'url' => ['/proyecto/index'], 'visible' => Yii::$app->user->can('proyecto/index')],
            ['label' => $icons['acc'].' Acción Centralizada', 'url' => ['/accion-centralizada'], 'visible' => Yii::$app->user->can('accion-centralizada/index')],                        

            Yii::$app->user->isGuest ?
                ['label' => $icons['entrar'].' Entrar', 'url' => ['/user/security/login']] :
                [
                    'label' => $icons['salir'].' Salir (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/user/security/logout'],
                    'linkOptions' => ['data-method' => 'post']
                ],
        ]
?>