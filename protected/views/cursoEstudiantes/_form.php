<?php
/* @var $this CursoEstudiantesController */
/* @var $model CursoEstudiantes */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'curso-estudiantes-form',
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
		<?php echo $form->labelEx($model,'username_estudiante'); ?>
		<?php echo $form->textField($model,'username_estudiante',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'username_estudiante'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->