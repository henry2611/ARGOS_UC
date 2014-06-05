<?php
/* @var $this ClasePreguntaController */
/* @var $data ClasePregunta */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_clase_pregunta')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_clase_pregunta), array('view', 'id'=>$data->id_clase_pregunta)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_clase_pregunta')); ?>:</b>
	<?php echo CHtml::encode($data->nombre_clase_pregunta); ?>
	<br />


</div>