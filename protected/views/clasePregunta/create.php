<?php
/* @var $this ClasePreguntaController */
/* @var $model ClasePregunta */

$this->breadcrumbs=array(
	'Clase Preguntas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClasePregunta', 'url'=>array('index')),
	array('label'=>'Manage ClasePregunta', 'url'=>array('admin')),
);
?>

<h1>Create ClasePregunta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>