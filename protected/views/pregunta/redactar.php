<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */

$this->breadcrumbs=array(
	'Evaluaciones'=>array('/Evaluacion/view/'.$model->id_evaluacion),
	'Preguntas'=>array('index'),
	//$model->id_evaluacion=>array('view','id'=>$model->id_evaluacion),
);

$this->menu=array(
	array('label'=>'Lista Preguntas', 'url'=>array('index')),
	array('label'=>'Administrar Preguntas', 'url'=>array('admin')),
);
?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<h1>Create Preguntas 
	<?php $pregunta=TipoPregunta::model()->findByPk($model->id_tipo_pregunta);	
		echo CHtml::encode($pregunta->nombre_tipo_pregunta);
	?></h1>

<?php echo $this->renderPartial('_redactar', array('model'=>$model)); ?>
