<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */

$this->breadcrumbs=array(
	'Tipo Preguntas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoPregunta', 'url'=>array('index')),
	array('label'=>'Manage TipoPregunta', 'url'=>array('admin')),
);
?>

<h1>Create TipoPregunta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>