<?php
/* @var $this RespuestaController */
/* @var $model Respuesta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_respuesta'); ?>
		<?php echo $form->textField($model,'id_respuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_pregunta'); ?>
		<?php echo $form->textField($model,'id_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_respuesta'); ?>
		<?php echo $form->textField($model,'id_tipo_respuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'texto_respuesta'); ?>
		<?php echo $form->textArea($model,'texto_respuesta',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->