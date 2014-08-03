<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'estudiante-evaluacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); 
		$id = Yii::app()->user->id;
		$user = Yii::app()->db->createCommand()->select('username')->from('cruge_user')
                ->where('iduser='.$id)->queryScalar();
		$criteria = Yii::app()->db->createCommand()
		-> select ('t.id_curso_estudiante, t.id_curso, t.username_estudiante, y.id_curso, y.nombre_curso')
		-> from ('Curso_Estudiantes t')
		-> join ('Curso y',' y.id_curso=t.id_curso')
		-> where ('t.username_estudiante='."'".$user."'")
		->queryAll();
		
	?>
	
	<div class="row">
		<?php echo $form->labelEx($model,'curso_estudiante'); ?>
		<?php echo $form->dropDownList($model,'id_curso_estudiante',CHTML::listData($criteria,'id_curso_estudiante','nombre_curso'),array(
			'prompt' => 'Seleccione un curso',
			'ajax' => array(
				'type' => 'POST',
				'url' => Yii::app()->createUrl('EstudianteEvaluacion/loadcursos'),
				'update' => '#EstudianteEvaluacion_id_evaluacion',
				'data' => array('id_curso_estudiante'=>'js:this.value'),
				))); ?>
		<?php echo $form->error($model,'id_curso_estudiante'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'id_evaluacion'); ?>
		<?php echo $form->dropDownList($model,'id_evaluacion',array(),array('prompt'=>'Escoja una evaluacion')); ?>
		<?php echo $form->error($model,'id_evaluacion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->