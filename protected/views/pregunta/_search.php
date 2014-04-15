<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_pregunta'); ?>
		<?php echo $form->textField($model,'id_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion'); ?>
		<?php echo $form->textField($model,'id_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_pregunta'); ?>
		<?php echo $form->textField($model,'id_tipo_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto_pregunta'); ?>
		<?php echo $form->textArea($model,'texto_pregunta',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->