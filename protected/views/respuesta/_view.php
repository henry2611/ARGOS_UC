<?php
/* @var $this RespuestaController */
/* @var $data Respuesta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_respuesta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_respuesta), array('view', 'id'=>$data->id_respuesta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pregunta')); ?>:</b>
	<?php echo CHtml::encode($data->id_pregunta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_respuesta')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_respuesta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto_respuesta')); ?>:</b>
	<?php echo CHtml::encode($data->texto_respuesta); ?>
	<br />


</div>