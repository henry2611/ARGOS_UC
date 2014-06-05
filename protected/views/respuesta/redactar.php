<?php
/* @var $this RespuestaController */
/* @var $model Respuesta */

$this->breadcrumbs=array(
	'Respuestas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Respuesta', 'url'=>array('index')),
	array('label'=>'Manage Respuesta', 'url'=>array('admin')),
);

?>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<h1>Create Respuesta</h1>

<?php echo $this->renderPartial('_redactar', array('model'=>$model)); ?>