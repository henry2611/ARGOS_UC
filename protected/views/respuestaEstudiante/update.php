<?php
/* @var $this RespuestaEstudianteController */
/* @var $model RespuestaEstudiante */

$this->breadcrumbs=array(
	'Respuesta Estudiantes'=>array('index'),
	$model->id_respuesta_estudiante=>array('view','id'=>$model->id_respuesta_estudiante),
	'Update',
);

$this->menu=array(
	//array('label'=>'Lista Respuestas Estudiante', 'url'=>array('index')),
	//array('label'=>'Create RespuestaEstudiante', 'url'=>array('create')),
	//array('label'=>'View RespuestaEstudiante', 'url'=>array('view', 'id'=>$model->id_respuesta_estudiante)),
	array('label'=>'Manage RespuestaEstudiante', 'url'=>array('admin')),
);
?>

<h1>Actualizar Respuesta Estudiante <?php echo $model->id_respuesta_estudiante; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>