<?php
/* @var $this RecursoController */
/* @var $model Recurso */

$this->breadcrumbs=array(
	'Recursos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Recurso', 'url'=>array('index')),
	array('label'=>'Manage Recurso', 'url'=>array('admin')),
);
?>

<h1>Create Recurso</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>