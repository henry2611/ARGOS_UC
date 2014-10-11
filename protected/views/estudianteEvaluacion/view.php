<?php
/* @var $this EstudianteEvaluacionController */
/* @var $model EstudianteEvaluacion */

$this->breadcrumbs=array(
	'Evaluacion Estudiante'=>array('index'),
	$model->id_evaluacion_estudiante,
);

$this->menu=array(
	array('label'=>'Lista Evaluaciones Estudiante', 'url'=>array('index')),
	array('label'=>'Crear Evaluacion Estudiante', 'url'=>array('create')),
	//array('label'=>'Update EstudianteEvaluacion', 'url'=>array('update', 'id'=>$model->id_evaluacion_estudiante)),
	//array('label'=>'Delete EstudianteEvaluacion', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_evaluacion_estudiante),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Evaluaciones Estudiante', 'url'=>array('admin')),
);
?>

<h1>Ver Evaluacion Estudiante #<?php echo $model->id_evaluacion_estudiante; ?></h1>



<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_evaluacion_estudiante',
		'id_evaluacion',
		'id_curso_estudiante',
		'calificacion',
	),
)); ?>

<?php 
		$iduser = Yii::app()->user->id;
		$user = Yii::app()->db->createCommand()->select('username')->from('cruge_user')
                ->where('iduser='.$iduser)->queryScalar();
				
		$criteria = new CDbCriteria;
		$criteria -> select = array('x.username_estudiante','t.id_evaluacion','t.id_curso_estudiante','t.id_evaluacion_estudiante');
		$criteria -> join = 'INNER JOIN Curso_Estudiantes x ON x.id_curso_estudiante=t.id_curso_estudiante AND x.username_estudiante='."'".$user."'";
		$criteria -> condition = 't.id_evaluacion_estudiante='."'".$model->id_evaluacion_estudiante."'";
		$test=EstudianteEvaluacion::model()->find($criteria);
		
		
?>

<?php if (($test)&&($model->calificacion===null)){?>
	<div class="row buttons">
		<?php echo CHtml::Button('Presentar',array('submit'=>'../respuestaestudiante/create','params'=>array('id_estudiante_evaluacion'=>$model->id_evaluacion_estudiante,'tipo_pregunta'=>'1'))); ?>
	</div>
<?php }?>