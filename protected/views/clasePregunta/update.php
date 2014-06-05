<?php
/* @var $this ClasePreguntaController */
/* @var $model ClasePregunta */

$this->breadcrumbs=array(
	'Clase Preguntas'=>array('index'),
	$model->id_clase_pregunta=>array('view','id'=>$model->id_clase_pregunta),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClasePregunta', 'url'=>array('index')),
	array('label'=>'Create ClasePregunta', 'url'=>array('create')),
	array('label'=>'View ClasePregunta', 'url'=>array('view', 'id'=>$model->id_clase_pregunta)),
	array('label'=>'Manage ClasePregunta', 'url'=>array('admin')),
);
?>

<h1>Update ClasePregunta <?php echo $model->id_clase_pregunta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>