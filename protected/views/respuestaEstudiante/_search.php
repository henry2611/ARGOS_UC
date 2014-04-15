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
		<?php echo $form->label($model,'id_respuesta'); ?>
		<?php echo $form->textField($model,'id_respuesta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->