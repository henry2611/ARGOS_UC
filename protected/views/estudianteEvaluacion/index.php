<?php
/* @var $this EstudianteEvaluacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Evaluaciones Estudiante',
);

$this->menu=array(
	array('label'=>'Crear Evaluacion Estudiante', 'url'=>array('create')),
	//array('label'=>'Manage Estudiante Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Evaluaciones Estudiante</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
