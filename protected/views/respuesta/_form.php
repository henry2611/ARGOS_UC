<?php
/* @var $this RespuestaController */
/* @var $model Respuesta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'respuesta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pregunta'); ?>
		<?php echo $form->textField($model,'id_pregunta'); ?>
		<?php echo $form->error($model,'id_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_respuesta'); ?>
		<?php echo $form->textField($model,'id_tipo_respuesta'); ?>
		<?php echo $form->error($model,'id_tipo_respuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto_respuesta'); ?>
		<?php echo $form->textArea($model,'texto_respuesta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto_respuesta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->