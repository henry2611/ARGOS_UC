<?php
/* @var $this TipoRespuestaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Respuestas',
);

$this->menu=array(
	array('label'=>'Create TipoRespuesta', 'url'=>array('create')),
	array('label'=>'Manage TipoRespuesta', 'url'=>array('admin')),
);
?>

<h1>Tipo Respuestas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
