<?php
/* @var $this EvaluacionController */
/* @var $data Evaluacion */
?>
<?php foreach($model as $data){?>
<div class="view">
	
	<b><?php echo CHtml::encode('Estudiante'); ?>:</b>
	<?php echo CHtml::encode($data->usernameEstudiante); ?>
	<br />	
	
	<b><?php echo CHtml::encode('Calificacion'); ?>:</b>
	<?php echo CHtml::encode($data->calificacion); ?>
	<br />
	
</div><?php }?>