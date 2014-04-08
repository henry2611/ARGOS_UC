<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estudiante-evaluacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_evaluacion'); ?>
		<?php echo $form->textField($model,'id_evaluacion'); ?>
		<?php echo $form->error($model,'id_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_curso_estudiante'); ?>
		<?php echo $form->textField($model,'id_curso_estudiante'); ?>
		<?php echo $form->error($model,'id_curso_estudiante'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'calificacion'); ?>
		<?php echo $form->textField($model,'calificacion'); ?>
		<?php echo $form->error($model,'calificacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->