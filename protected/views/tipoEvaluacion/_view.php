<?php
/* @var $this TipoEvaluacionController */
/* @var $data TipoEvaluacion */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_evaluacion')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_evaluacion), array('view', 'id'=>$data->id_tipo_evaluacion)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_evaluacion')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_evaluacion); ?>
	<br />


</div>