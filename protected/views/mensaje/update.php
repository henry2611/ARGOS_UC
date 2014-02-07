<?php
/* @var $this MensajeController */
/* @var $model Mensaje */

$this->breadcrumbs=array(
	'Mensajes'=>array('index'),
	$model->id_mensaje=>array('view','id'=>$model->id_mensaje),
	'Update',
);

$this->menu=array(
	array('label'=>'List Mensaje', 'url'=>array('index')),
	array('label'=>'Create Mensaje', 'url'=>array('create')),
	array('label'=>'View Mensaje', 'url'=>array('view', 'id'=>$model->id_mensaje)),
	array('label'=>'Manage Mensaje', 'url'=>array('admin')),
);
?>

<h1>Update Mensaje <?php echo $model->id_mensaje; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>