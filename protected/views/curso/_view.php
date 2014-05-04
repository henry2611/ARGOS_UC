<?php
/* @var $this CursoController */
/* @var $data Curso */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_curso')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->nombre_curso), array('view', 'id'=>$data->id_curso)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descripcion_curso')); ?>:</b>
	<?php echo CHtml::encode($data->descripcion_curso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username_docente')); ?>:</b>
	<?php echo CHtml::encode($data->username_docente); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('numero_estudiantes')); ?>:</b>
	<?php echo CHtml::encode($data->numero_estudiantes); ?>
	<br />


</div>