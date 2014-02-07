<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	$model->id_clase=>array('view','id'=>$model->id_clase),
	'Update',
);

$this->menu=array(
	array('label'=>'List Clase', 'url'=>array('index')),
	array('label'=>'Create Clase', 'url'=>array('create')),
	array('label'=>'View Clase', 'url'=>array('view', 'id'=>$model->id_clase)),
	array('label'=>'Manage Clase', 'url'=>array('admin')),
);
?>

<h1>Update Clase <?php echo $model->id_clase; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>