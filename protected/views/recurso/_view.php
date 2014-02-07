<?php
/* @var $this RecursoController */
/* @var $data Recurso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_recurso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_recurso), array('view', 'id'=>$data->id_recurso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_clase')); ?>:</b>
	<?php echo CHtml::encode($data->id_clase); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_recurso')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_recurso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ubicacion_recurso')); ?>:</b>
	<?php echo CHtml::encode($data->ubicacion_recurso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('duracion_recurso')); ?>:</b>
	<?php echo CHtml::encode($data->duracion_recurso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('peso_recurso')); ?>:</b>
	<?php echo CHtml::encode($data->peso_recurso); ?>
	<br />


</div>