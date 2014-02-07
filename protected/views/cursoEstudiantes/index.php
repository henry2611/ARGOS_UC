<?php
/* @var $this CursoEstudiantesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Curso Estudiantes',
);

$this->menu=array(
	array('label'=>'Create CursoEstudiantes', 'url'=>array('create')),
	array('label'=>'Manage CursoEstudiantes', 'url'=>array('admin')),
);
?>

<h1>Curso Estudiantes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
