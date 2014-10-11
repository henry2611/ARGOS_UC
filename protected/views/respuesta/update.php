<?php
/* @var $this RespuestaController */
/* @var $model Respuesta */

$this->breadcrumbs=array(
	'Respuestas'=>array('index'),
	$model->id_respuesta=>array('view','id'=>$model->id_respuesta),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Respuestas', 'url'=>array('index')),
	array('label'=>'Crear Respuesta', 'url'=>array('create')),
	array('label'=>'Ver Respuesta', 'url'=>array('view', 'id'=>$model->id_respuesta)),
	array('label'=>'Administrar Respuesta', 'url'=>array('admin')),
);
?>

<h1>Update Respuesta <?php echo $model->id_respuesta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>