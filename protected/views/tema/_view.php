<?php
/* @var $this TemaController */
/* @var $data Tema */
?>

<div class="view">


	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_tema')); ?>:</b>
        <?php echo CHtml::link(CHtml::encode($data->nombre_tema), array('view', 'id'=>$data->id_tema)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_tema')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_tema); ?>
	<br />


</div>