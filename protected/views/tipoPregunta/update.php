<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */

$this->breadcrumbs=array(
	'Tipo Preguntas'=>array('index'),
	$model->id_tipo_pregunta=>array('view','id'=>$model->id_tipo_pregunta),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoPregunta', 'url'=>array('index')),
	array('label'=>'Create TipoPregunta', 'url'=>array('create')),
	array('label'=>'View TipoPregunta', 'url'=>array('view', 'id'=>$model->id_tipo_pregunta)),
	array('label'=>'Manage TipoPregunta', 'url'=>array('admin')),
);
?>

<h1>Update TipoPregunta <?php echo $model->id_tipo_pregunta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>