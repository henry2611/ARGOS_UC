<?php
/* @var $this EstudianteEvaluacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Estudiante Evaluacions',
);

$this->menu=array(
	array('label'=>'Create EstudianteEvaluacion', 'url'=>array('create')),
	array('label'=>'Manage EstudianteEvaluacion', 'url'=>array('admin')),
);
?>

<h1>Estudiante Evaluacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
