<?php
/* @var $this MensajeController */
/* @var $model Mensaje */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'mensaje-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'username_destino'); ?>
		<?php echo $form->textField($model,'username_destino',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'username_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username_origen'); ?>
		<?php echo $form->textField($model,'username_origen',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'username_origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'texto_mensaje'); ?>
		<?php echo $form->textArea($model,'texto_mensaje',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto_mensaje'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->