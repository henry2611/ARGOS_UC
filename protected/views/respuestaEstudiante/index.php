<?php
/* @var $this RespuestaEstudianteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Respuesta Estudiantes',
);

$this->menu=array(
	array('label'=>'Crear Respuesta Evaluacion', 'url'=>array('create')),
	array('label'=>'Administrar Respuestas Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Respuesta Evaluacion</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
