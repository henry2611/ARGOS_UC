<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pregunta-form',
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
		<?php echo $form->labelEx($model,'id_tipo_pregunta'); ?>
		<?php echo $form->textField($model,'id_tipo_pregunta'); ?>
		<?php echo $form->error($model,'id_tipo_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto_pregunta'); ?>
		<?php echo $form->textArea($model,'texto_pregunta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto_pregunta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->