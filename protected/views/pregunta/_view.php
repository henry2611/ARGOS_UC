<?php
/* @var $this PreguntaController */
/* @var $data Pregunta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pregunta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_pregunta), array('view', 'id'=>$data->id_pregunta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_pregunta')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_pregunta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto_pregunta')); ?>:</b>
	<?php echo CHtml::encode($data->texto_pregunta); ?>
	<br />


</div>