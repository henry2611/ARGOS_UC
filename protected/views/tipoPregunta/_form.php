<?php
/* @var $this TipoPreguntaController */
/* @var $model TipoPregunta */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-pregunta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_tipo_pregunta'); ?>
		<?php echo $form->textField($model,'nombre_tipo_pregunta',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'nombre_tipo_pregunta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->