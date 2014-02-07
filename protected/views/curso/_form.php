<?php
/* @var $this CursoController */
/* @var $model Curso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'curso-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_curso'); ?>
		<?php echo $form->textField($model,'nombre_curso',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_curso'); ?>
		<?php echo $form->textArea($model,'descripcion_curso',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username_docente'); ?>
		<?php echo $form->textField($model,'username_docente',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'username_docente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_estudiantes'); ?>
		<?php echo $form->textField($model,'numero_estudiantes'); ?>
		<?php echo $form->error($model,'numero_estudiantes'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->