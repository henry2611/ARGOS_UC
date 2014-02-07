<?php
/* @var $this RecursoController */
/* @var $model Recurso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_recurso'); ?>
		<?php echo $form->textField($model,'id_recurso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_clase'); ?>
		<?php echo $form->textField($model,'id_clase'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_recurso'); ?>
		<?php echo $form->textField($model,'nombre_recurso',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'ubicacion_recurso'); ?>
		<?php echo $form->textArea($model,'ubicacion_recurso',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'duracion_recurso'); ?>
		<?php echo $form->textField($model,'duracion_recurso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'peso_recurso'); ?>
		<?php echo $form->textField($model,'peso_recurso'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->