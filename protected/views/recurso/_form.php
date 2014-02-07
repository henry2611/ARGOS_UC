<?php
/* @var $this RecursoController */
/* @var $model Recurso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recurso-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_clase'); ?>
		<?php echo $form->textField($model,'id_clase'); ?>
		<?php echo $form->error($model,'id_clase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_recurso'); ?>
		<?php echo $form->textField($model,'nombre_recurso',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre_recurso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ubicacion_recurso'); ?>
		<?php echo $form->textArea($model,'ubicacion_recurso',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'ubicacion_recurso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'duracion_recurso'); ?>
		<?php echo $form->textField($model,'duracion_recurso'); ?>
		<?php echo $form->error($model,'duracion_recurso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'peso_recurso'); ?>
		<?php echo $form->textField($model,'peso_recurso'); ?>
		<?php echo $form->error($model,'peso_recurso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->