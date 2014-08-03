<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */
/* @var $form CActiveForm */

?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion_estudiante'); ?>
		<?php echo $form->textField($model,'id_evaluacion_estudiante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion'); ?>
		<?php echo $form->textField($model,'id_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_curso_estudiante'); ?>
		<?php echo $form->textField($model,'id_curso_estudiante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'calificacion'); ?>
		<?php echo $form->textField($model,'calificacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->