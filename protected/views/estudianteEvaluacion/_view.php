<?php
/* @var $this EstudianteEvaluacionController */
/* @var $data EstudianteEvaluacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion_estudiante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_evaluacion_estudiante), array('view', 'id'=>$data->id_evaluacion_estudiante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curso_estudiante')); ?>:</b>
	<?php echo CHtml::encode($data->id_curso_estudiante); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('calificacion')); ?>:</b>
	<?php echo CHtml::encode($data->calificacion); ?>
	<br />

</div>
