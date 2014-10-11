<?php
/* @var $this RespuestaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Respuestas',
);

$this->menu=array(
	array('label'=>'Crear Respuesta', 'url'=>array('create')),
	array('label'=>'Administrar Respuesta', 'url'=>array('admin')),
);
?>

<h1>Respuestas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
