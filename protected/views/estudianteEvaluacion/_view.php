<?php
/* @var $this EstudianteEvaluacionController */
/* @var $data EstudianteEvaluacion */

$criteria= new CDbCriteria();
$criteria -> select = 'clase.nombre_clase AS nombreClases, curso.nombre_curso AS nombreCursos';
$criteria -> join = 'LEFT JOIN clase ON clase.id_clase=t.id_clase ';
$criteria -> join.= 'LEFT JOIN tema ON tema.id_tema=clase.id_tema ';
$criteria -> join.= 'INNER JOIN curso ON curso.id_curso=tema.id_curso ';
$criteria -> condition = 't.id_evaluacion=:value';
$criteria -> params = array(':value'=>$data->id_evaluacion);
$evaluacion= Evaluacion::model()->findAll($criteria);

?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion_estudiante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_evaluacion_estudiante), array('view', 'id'=>$data->id_evaluacion_estudiante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('evaluacion')); ?>:</b>
	<?php echo CHtml::encode($evaluacion[0]->nombreClases);  ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('curso_estudiante')); ?>:</b>
	<?php echo CHtml::encode($evaluacion[0]->nombreCursos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calificacion')); ?>:</b>
	<?php echo CHtml::encode($data->calificacion); ?>
	<br />

</div>
