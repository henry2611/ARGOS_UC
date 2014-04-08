<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion'); ?>
		<?php echo $form->textField($model,'id_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_evaluacion'); ?>
		<?php echo $form->textField($model,'id_tipo_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_clase'); ?>
		<?php echo $form->textField($model,'id_clase'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'porcentaje'); ?>
		<?php echo $form->textField($model,'porcentaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tiempo_inicio'); ?>
		<?php echo $form->textField($model,'tiempo_incio'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'tiempo_final'); ?>
		<?php echo $form->textField($model,'tiempo_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'numero_max_tips'); ?>
		<?php echo $form->textField($model,'numero_max_tips'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cant_dificil'); ?>
		<?php echo $form->textField($model,'cant_dificil'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cant_intermedio'); ?>
		<?php echo $form->textField($model,'cant_intermedio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cant_facil'); ?>
		<?php echo $form->textField($model,'cant_facil'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'puntuacion_dificil'); ?>
		<?php echo $form->textField($model,'puntuacion_dificil'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'puntuacion_intermedio'); ?>
		<?php echo $form->textField($model,'puntuacion_intermedio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'puntuacion_facil'); ?>
		<?php echo $form->textField($model,'puntuacion_facil'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->