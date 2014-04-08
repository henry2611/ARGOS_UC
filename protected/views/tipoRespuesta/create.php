<?php
/* @var $this TipoRespuestaController */
/* @var $model TipoRespuesta */

$this->breadcrumbs=array(
	'Tipo Respuestas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoRespuesta', 'url'=>array('index')),
	array('label'=>'Manage TipoRespuesta', 'url'=>array('admin')),
);
?>

<h1>Create TipoRespuesta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>