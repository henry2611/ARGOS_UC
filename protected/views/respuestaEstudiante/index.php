<?php
/* @var $this RespuestaEstudianteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Respuesta Estudiantes',
);

$this->menu=array(
	array('label'=>'Create RespuestaEstudiante', 'url'=>array('create')),
	array('label'=>'Manage RespuestaEstudiante', 'url'=>array('admin')),
);
?>

<h1>Respuesta Estudiantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
