<?php
/* @var $this TipoRespuestaController */
/* @var $model TipoRespuesta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-respuesta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_tipo_respuesta'); ?>
		<?php echo $form->textField($model,'nombre_tipo_respuesta',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre_tipo_respuesta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->