<?php
/* @var $this EvaluacionController */
/* @var $data Evaluacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_evaluacion')); $model=TipoEvaluacion::model()->find("id_tipo_evaluacion=:param", array("param"=>$data->id_tipo_evaluacion));?>:</b>
	<?php echo CHtml::encode($model->nombre_evaluacion); 
	?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('clase')); $model=Clase::model()->find("id_clase=:param", array("param"=>$data->id_clase));?>:</b>
	<?php echo CHtml::encode($model->nombre_clase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tiempo_inicio')); ?>:</b>
	<?php echo CHtml::encode($data->tiempo_inicio); ?>
	<br />	
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('tiempo_final')); ?>:</b>
	<?php echo CHtml::encode($data->tiempo_final); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_max_tips')); ?>:</b>
	<?php echo CHtml::encode($data->numero_max_tips); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('cant_dificil')); ?>:</b>
	<?php echo CHtml::encode($data->cant_dificil); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('cant_intermedio')); ?>:</b>
	<?php echo CHtml::encode($data->cant_intermedio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cant_facil')); ?>:</b>
	<?php echo CHtml::encode($data->cant_facil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puntuacion_dificil')); ?>:</b>
	<?php echo CHtml::encode($data->puntuacion_dificil); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puntuacion_intermedio')); ?>:</b>
	<?php echo CHtml::encode($data->puntuacion_intermedio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('puntuacion_facil')); ?>:</b>
	<?php echo CHtml::encode($data->puntuacion_facil); ?>
	<br />

	*/ ?>

</div>