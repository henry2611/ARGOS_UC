<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	$model->id_pregunta=>array('view','id'=>$model->id_pregunta),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pregunta', 'url'=>array('index')),
	array('label'=>'Create Pregunta', 'url'=>array('create')),
	array('label'=>'View Pregunta', 'url'=>array('view', 'id'=>$model->id_pregunta)),
	array('label'=>'Manage Pregunta', 'url'=>array('admin')),
);
?>

<h1>Update Pregunta <?php echo $model->id_pregunta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>