<?php
/* @var $this RespuestaEstudianteController */
/* @var $model RespuestaEstudiante */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_respuesta_estudiante'); ?>
		<?php echo $form->textField($model,'id_respuesta_estudiante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_estudiante_evaluacion'); ?>
		<?php echo $form->textField($model,'id_estudiante_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pregunta'); ?>
		<?php echo $form->textField($model,'id_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto_respuesta'); ?>
		<?php echo $form->textField($model,'texto_respuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto_respuesta_b'); ?>
		<?php echo $form->textField($model,'texto_respuesta_b'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->