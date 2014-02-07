<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'regdate'); ?>
		<?php echo $form->textField($model,'regdate',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'regdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actdate'); ?>
		<?php echo $form->textField($model,'actdate',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'actdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'logondate'); ?>
		<?php echo $form->textField($model,'logondate',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'logondate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>64)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'authkey'); ?>
		<?php echo $form->textField($model,'authkey',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'authkey'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'state'); ?>
		<?php echo $form->textField($model,'state'); ?>
		<?php echo $form->error($model,'state'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'totalsessioncounter'); ?>
		<?php echo $form->textField($model,'totalsessioncounter'); ?>
		<?php echo $form->error($model,'totalsessioncounter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'currentsessioncounter'); ?>
		<?php echo $form->textField($model,'currentsessioncounter'); ?>
		<?php echo $form->error($model,'currentsessioncounter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreUsuario'); ?>
		<?php echo $form->textField($model,'nombreUsuario',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nombreUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaNacimiento'); ?>
		<?php echo $form->textField($model,'fechaNacimiento'); ?>
		<?php echo $form->error($model,'fechaNacimiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dependencia'); ?>
		<?php echo $form->textArea($model,'dependencia',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'dependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'foto'); ?>
		<?php echo $form->textField($model,'foto',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'foto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fechaUltConex'); ?>
		<?php echo $form->textField($model,'fechaUltConex'); ?>
		<?php echo $form->error($model,'fechaUltConex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'bioUsuario'); ?>
		<?php echo $form->textArea($model,'bioUsuario',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'bioUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ipUltConex'); ?>
		<?php echo $form->textField($model,'ipUltConex',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'ipUltConex'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numTips'); ?>
		<?php echo $form->textField($model,'numTips'); ?>
		<?php echo $form->error($model,'numTips'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->