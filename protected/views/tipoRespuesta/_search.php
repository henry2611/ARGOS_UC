<?php
/* @var $this TipoRespuestaController */
/* @var $model TipoRespuesta */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_respuesta'); ?>
		<?php echo $form->textField($model,'id_tipo_respuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre_tipo_respuesta'); ?>
		<?php echo $form->textField($model,'nombre_tipo_respuesta',array('size'=>60,'maxlength'=>64)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->