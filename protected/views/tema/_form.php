<?php
/* @var $this TemaController */
/* @var $model Tema */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tema-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_curso'); ?>
		<?php echo $form->textField($model,'id_curso'); ?>
		<?php echo $form->error($model,'id_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_tema'); ?>
		<?php echo $form->textField($model,'nombre_tema',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre_tema'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_tema'); ?>
		<?php echo $form->textArea($model,'descripcion_tema',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion_tema'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->