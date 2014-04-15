<?php
/* @var $this TipoEvaluacionController */
/* @var $model TipoEvaluacion */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_evaluacion'); ?>
		<?php echo $form->textField($model,'id_tipo_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_evaluacion'); ?>
		<?php echo $form->textField($model,'nombre_evaluacion',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->