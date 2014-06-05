<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('/Evaluacion/view/'.$model->id_evaluacion),
	'Preguntas'=>array('index'),
	//$model->id_evaluacion=>array('view','id'=>$model->id_evaluacion),
);

$this->menu=array(
	array('label'=>'List Pregunta', 'url'=>array('index')),
	array('label'=>'Manage Pregunta', 'url'=>array('admin')),
);
?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<h1>Create Preguntas 
	<?php $pregunta=TipoPregunta::model()->find(array('select'=>'nombre_tipo_pregunta','condition'=>'id_tipo_pregunta=:param1','params'=>array(':param1'=>$model->id_tipo_pregunta)));	
	echo CHtml::encode($pregunta->nombre_tipo_pregunta);
	?></h1>
<?php $evaluacion=Evaluacion::model()->find($model->id_evaluacion);?>
<?php echo $this->renderPartial('_redactar', array('model'=>$model,'id'=>$model->id_evaluacion)); ?>
