<?php
/* @var $this ClaseController */
/* @var $data Clase */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_clase')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_clase), array('view', 'id'=>$data->id_clase)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tema')); ?>:</b>
	<?php echo CHtml::encode($data->id_tema); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_clase')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_clase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_clase')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_clase); ?>
	<br />


</div>