<?php
/* @var $this ClaseController */
/* @var $model Clase */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'clase-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tema'); ?>
		<?php echo $form->textField($model,'id_tema'); ?>
		<?php echo $form->error($model,'id_tema'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_clase'); ?>
		<?php echo $form->textField($model,'nombre_clase',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre_clase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_clase'); ?>
		<?php echo $form->textArea($model,'descripcion_clase',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion_clase'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->