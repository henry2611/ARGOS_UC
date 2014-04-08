<?php
/* @var $this TipoRespuestaController */
/* @var $model TipoRespuesta */

$this->breadcrumbs=array(
	'Tipo Respuestas'=>array('index'),
	$model->id_tipo_respuesta=>array('view','id'=>$model->id_tipo_respuesta),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoRespuesta', 'url'=>array('index')),
	array('label'=>'Create TipoRespuesta', 'url'=>array('create')),
	array('label'=>'View TipoRespuesta', 'url'=>array('view', 'id'=>$model->id_tipo_respuesta)),
	array('label'=>'Manage TipoRespuesta', 'url'=>array('admin')),
);
?>

<h1>Update TipoRespuesta <?php echo $model->id_tipo_respuesta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>