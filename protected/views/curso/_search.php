<?php
/* @var $this CursoController */
/* @var $model Curso */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_curso'); ?>
		<?php echo $form->textField($model,'id_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_curso'); ?>
		<?php echo $form->textField($model,'nombre_curso',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_curso'); ?>
		<?php echo $form->textArea($model,'descripcion_curso',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username_docente'); ?>
		<?php echo $form->textField($model,'username_docente',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_estudiantes'); ?>
		<?php echo $form->textField($model,'numero_estudiantes'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->