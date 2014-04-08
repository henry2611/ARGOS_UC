<?php
/* @var $this TipoPreguntaController */
/* @var $data TipoPregunta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_pregunta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tipo_pregunta), array('view', 'id'=>$data->id_tipo_pregunta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_tipo_pregunta')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_tipo_pregunta); ?>
	<br />


</div>