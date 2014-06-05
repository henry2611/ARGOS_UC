<?php
/* @var $this ClasePreguntaController */
/* @var $model ClasePregunta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_clase_pregunta'); ?>
		<?php echo $form->textField($model,'id_clase_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_clase_pregunta'); ?>
		<?php echo $form->textField($model,'nombre_clase_pregunta',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->