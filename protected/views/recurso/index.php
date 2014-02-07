<?php
/* @var $this RecursoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Recursos',
);

$this->menu=array(
	array('label'=>'Create Recurso', 'url'=>array('create')),
	array('label'=>'Manage Recurso', 'url'=>array('admin')),
);
?>

<h1>Recursos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
