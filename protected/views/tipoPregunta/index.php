<?php
/* @var $this TipoPreguntaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Preguntas',
);

$this->menu=array(
	array('label'=>'Create TipoPregunta', 'url'=>array('create')),
	array('label'=>'Manage TipoPregunta', 'url'=>array('admin')),
);
?>

<h1>Tipo Preguntas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
