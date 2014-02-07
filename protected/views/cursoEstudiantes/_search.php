<?php
/* @var $this CursoEstudiantesController */
/* @var $model CursoEstudiantes */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_curso_estudiante'); ?>
		<?php echo $form->textField($model,'id_curso_estudiante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_curso'); ?>
		<?php echo $form->textField($model,'id_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username_estudiante'); ?>
		<?php echo $form->textField($model,'username_estudiante',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->