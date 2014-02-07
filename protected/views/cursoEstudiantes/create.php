<?php
/* @var $this CursoEstudiantesController */
/* @var $model CursoEstudiantes */

$this->breadcrumbs=array(
	'Curso Estudiantes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CursoEstudiantes', 'url'=>array('index')),
	array('label'=>'Manage CursoEstudiantes', 'url'=>array('admin')),
);
?>

<h1>Create CursoEstudiantes</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>