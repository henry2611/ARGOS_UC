<?php
/* @var $this EvaluacionController */
/* @var $model Evaluacion */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'evaluacion-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); 
		$test=new Curso;
		$id = Yii::app()->user->id;
		$user = Yii::app()->db->createCommand()->select('username')->from('cruge_user')
                ->where('iduser='.$id)->queryScalar();
		$criteria = Yii::app()->db->createCommand()
		-> select ('t.id_curso, t.username_docente, t.nombre_curso')
		-> from ('Curso t')
		-> where ('t.username_docente='."'".$user."'")
		->queryAll();
	
	?>
	
	<div class="row">
		<?php echo $form->labelEx($test,'curso'); ?>
		<?php echo $form->dropDownList($test,'id_curso',CHTML::listData($criteria,'id_curso','nombre_curso'),array(
			'prompt' => 'Seleccione un curso',
			'ajax' => array(
				'type' => 'POST',
				'url' => Yii::app()->createUrl('Evaluacion/loadcursos'),
				'update' => '#Evaluacion_id_clase',
				'data' => array('id_curso'=>'js:this.value'),
				))); ?>
		<?php echo $form->error($test,'id_curso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'clase'); ?>
		<?php echo $form->dropDownList($model,'id_clase',CHTML::listData(Clase::model()->findAll(),'id_clase','nombre_clase'),array('empty'=>'Seleccione una clase')); ?>
		<?php echo $form->error($model,'id_clase'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'porcentaje'); ?>
		<?php echo $form->numberField($model,'porcentaje',array('min'=>'0','max'=>'100','value'=>'0')); ?>
		<?php echo $form->error($model,'porcentaje'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'inicio de la evacluacion'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
		$this->widget('CJuiDateTimePicker',array(
			'model'=>$model, //Model object
			'attribute'=>'tiempo_inicio', //attribute name
					'mode'=>'datetime', //use "time","date" or "datetime" (default)
			'options'=>array("dateFormat"=>'yy-mm-dd',"timeFormat"=>'hh:mm:ss') // jquery plugin options
		));
		?>
		<?php echo $form->error($model,'tiempo_inicio'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'fin de la evaluacion'); ?>
		<?php Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
		$this->widget('CJuiDateTimePicker',array(
			'model'=>$model, //Model object
			'attribute'=>'tiempo_final', //attribute name
					'mode'=>'datetime', //use "time","date" or "datetime" (default)
			'options'=>array("dateFormat"=>'yy-mm-dd',"timeFormat"=>'hh:mm:ss') // jquery plugin options
		));
		?>
		<?php echo $form->error($model,'tiempo_final'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_maximo_tips'); ?>
		<?php echo $form->numberField($model,'numero_max_tips',array('min'=>'0','max'=>'10','value'=>'0')); ?>
		<?php echo $form->error($model,'numero_max_tips'); ?>
	</div>

	<div class="row">
		<span style="float:left;width:50%;">
			<?php echo $form->labelEx($model,'cantidad_de_preguntas_dificiles'); ?>
			<?php echo $form->numberField($model,'cant_dificil',array('min'=>'0','max'=>'100','value'=>'0')); ?>
			<?php echo $form->error($model,'cant_dificil'); ?>
		</span>
		<span style="float:right;width:50%;">
			<?php echo $form->labelEx($model,'puntuacion_preguntas_dificiles'); ?>
			<?php echo $form->numberField($model,'puntuacion_dificil', array('min'=>'0','max'=>'100','value'=>'0')); ?>
			<?php echo $form->error($model,'puntuacion_dificil'); ?>
		</span>
	</div>

	<div class="row">
		<span style="float:left;width:50%;">
			<?php echo $form->labelEx($model,'cantidad_de_preguntas_medio'); ?>
			<?php echo $form->numberField($model,'cant_intermedio',array('min'=>'0','max'=>'100','value'=>'0')); ?>
			<?php echo $form->error($model,'cant_intermedio'); ?>
		</span>
		<span style="float:right;width:50%;">
			<?php echo $form->labelEx($model,'puntuacion_preguntas_medio'); ?>
			<?php echo $form->numberField($model,'puntuacion_intermedio', array('min'=>'0','max'=>'100','value'=>'0')); ?>
			<?php echo $form->error($model,'puntuacion_intermedio'); ?>
		</span>
	</div>

	<div class="row">
		<span style="float:left;width:50%;">
		<?php echo $form->labelEx($model,'cantidad_de_preguntas_faciles'); ?>
		<?php echo $form->numberField($model,'cant_facil',array('min'=>'0','max'=>'100','value'=>'0')); ?>
		<?php echo $form->error($model,'cant_facil'); ?>
		</span>
		<span style="float:right;width:50%;">
		<?php echo $form->labelEx($model,'puntuacion_preguntas_faciles'); ?>
		<?php echo $form->numberField($model,'puntuacion_facil',array('min'=>'0','max'=>'100','value'=>'0')); ?>
		<?php echo $form->error($model,'puntuacion_facil'); ?>
		</span>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget();?>

</div><!-- form -->