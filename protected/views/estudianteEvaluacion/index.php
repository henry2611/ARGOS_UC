<?php
/* @var $this EstudianteEvaluacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estudiante Evaluaciones',
);

$this->menu=array(
	array('label'=>'Create Estudiante Evaluacion', 'url'=>array('create')),
	array('label'=>'Manage Estudiante Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Estudiante Evaluaciones</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
