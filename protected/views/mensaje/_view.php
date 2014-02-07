<?php
/* @var $this MensajeController */
/* @var $data Mensaje */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_mensaje')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_mensaje), array('view', 'id'=>$data->id_mensaje)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username_destino')); ?>:</b>
	<?php echo CHtml::encode($data->username_destino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username_origen')); ?>:</b>
	<?php echo CHtml::encode($data->username_origen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('texto_mensaje')); ?>:</b>
	<?php echo CHtml::encode($data->texto_mensaje); ?>
	<br />


</div>