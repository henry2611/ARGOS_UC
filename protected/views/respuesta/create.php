<?php
/* @var $this RespuestaController */
/* @var $model Respuesta */

$this->breadcrumbs=array(
	'Respuestas'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Lista Respuestas', 'url'=>array('index')),
	array('label'=>'Administar Respuesta', 'url'=>array('admin')),
);
?>

<h1>Create Respuesta</h1>

<?php echo $this->renderPartial('_redactar', array('model'=>$model)); ?>