<?php
/* @var $this TipoRespuestaController */
/* @var $data TipoRespuesta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_respuesta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_respuesta), array('view', 'id'=>$data->id_tipo_respuesta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_tipo_respuesta')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_tipo_respuesta); ?>
	<br />


</div>