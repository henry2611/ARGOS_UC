<?php
/* @var $this TemaController */
/* @var $model Tema */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tema'); ?>
		<?php echo $form->textField($model,'id_tema'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_curso'); ?>
		<?php echo $form->textField($model,'id_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_tema'); ?>
		<?php echo $form->textField($model,'nombre_tema',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_tema'); ?>
		<?php echo $form->textArea($model,'descripcion_tema',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->