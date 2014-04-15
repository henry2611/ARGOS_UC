<?php
/* @var $this RespuestaEstudianteController */
/* @var $model RespuestaEstudiante */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'respuesta-estudiante-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_estudiante_evaluacion'); ?>
		<?php echo $form->textField($model,'id_estudiante_evaluacion'); ?>
		<?php echo $form->error($model,'id_estudiante_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_respuesta'); ?>
		<?php echo $form->textField($model,'id_respuesta'); ?>
		<?php echo $form->error($model,'id_respuesta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->