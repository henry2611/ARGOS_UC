<?php
/* @var $this CursoEstudiantesController */
/* @var $model CursoEstudiantes */

$this->breadcrumbs=array(
	'Curso Estudiantes'=>array('index'),
	$model->id_curso_estudiante,
);

$this->menu=array(
	array('label'=>'List CursoEstudiantes', 'url'=>array('index')),
	array('label'=>'Create CursoEstudiantes', 'url'=>array('create')),
	array('label'=>'Update CursoEstudiantes', 'url'=>array('update', 'id'=>$model->id_curso_estudiante)),
	array('label'=>'Delete CursoEstudiantes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_curso_estudiante),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CursoEstudiantes', 'url'=>array('admin')),
);
?>

<h1>View CursoEstudiantes #<?php echo $model->id_curso_estudiante; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_curso_estudiante',
		'id_curso',
		'username_estudiante',
	),
)); ?>
