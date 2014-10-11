<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Preguntas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista Preguntas', 'url'=>array('index')),
	array('label'=>'Administrar Preguntas', 'url'=>array('admin')),
);
?>

<h1>Create Pregunta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>