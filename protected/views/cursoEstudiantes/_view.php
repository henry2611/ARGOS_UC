<?php
/* @var $this CursoEstudiantesController */
/* @var $data CursoEstudiantes */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curso_estudiante')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_curso_estudiante), array('view', 'id'=>$data->id_curso_estudiante)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_curso')); ?>:</b>
	<?php echo CHtml::encode($data->id_curso); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username_estudiante')); ?>:</b>
	<?php echo CHtml::encode($data->username_estudiante); ?>
	<br />


</div>