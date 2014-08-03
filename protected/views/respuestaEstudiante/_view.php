<?php
/* @var $this RespuestaEstudianteController */
/* @var $data RespuestaEstudiante */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_respuesta_estudiante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_respuesta_estudiante), array('view', 'id'=>$data->id_respuesta_estudiante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estudiante_evaluacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_estudiante_evaluacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pregunta')); ?>:</b>
	<?php echo CHtml::encode($data->id_pregunta); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('texto_respuesta')); ?>:</b>
	<?php echo CHtml::encode($data->texto_respuesta); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('texto_respuesta_b')); ?>:</b>
	<?php echo CHtml::encode($data->texto_respuesta_b); ?>
	<br />


</div>