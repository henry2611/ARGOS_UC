<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	$model->id_pregunta=>array('view','id'=>$model->id_pregunta),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista Preguntas', 'url'=>array('index')),
	array('label'=>'Crear Pregunta', 'url'=>array('create')),
	array('label'=>'Ver Pregunta', 'url'=>array('view', 'id'=>$model->id_pregunta)),
	array('label'=>'Administrar Preguntas', 'url'=>array('admin')),
);
?>

<h1>Update Pregunta <?php echo $model->id_pregunta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>