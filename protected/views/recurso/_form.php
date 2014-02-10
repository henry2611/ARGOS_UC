<?php
/* @var $this RecursoController */
/* @var $model Recurso */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'recurso-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_clase'); ?>
		<?php echo $form->textField($model,'id_clase'); ?>
		<?php echo $form->error($model,'id_clase'); ?>
	</div>
        <br/>
        <div class="row">
            <?php 
                echo $form->labelEx($model, 'diapositiva');
                echo $form->fileField($model, 'diapositiva');
                echo $form->error($model, 'diapositiva'); ?>
        </div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

        <?php $this->endWidget(); ?>
        

</div><!-- form -->