<?php
/* @var $this CursoEstudiantesController */
/* @var $model CursoEstudiantes */

$this->breadcrumbs=array(
	'Curso Estudiantes'=>array('index'),
	$model->id_curso_estudiante=>array('view','id'=>$model->id_curso_estudiante),
	'Update',
);

$this->menu=array(
	array('label'=>'List CursoEstudiantes', 'url'=>array('index')),
	array('label'=>'Create CursoEstudiantes', 'url'=>array('create')),
	array('label'=>'View CursoEstudiantes', 'url'=>array('view', 'id'=>$model->id_curso_estudiante)),
	array('label'=>'Manage CursoEstudiantes', 'url'=>array('admin')),
);
?>

<h1>Update CursoEstudiantes <?php echo $model->id_curso_estudiante; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>