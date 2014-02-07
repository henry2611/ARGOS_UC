<?php
/* @var $this TemaController */
/* @var $model Tema */

$this->breadcrumbs=array(
	'Temas'=>array('index'),
	$model->id_tema=>array('view','id'=>$model->id_tema),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tema', 'url'=>array('index')),
	array('label'=>'Create Tema', 'url'=>array('create')),
	array('label'=>'View Tema', 'url'=>array('view', 'id'=>$model->id_tema)),
	array('label'=>'Manage Tema', 'url'=>array('admin')),
);
?>

<h1>Update Tema <?php echo $model->id_tema; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>