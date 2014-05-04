<?php
/* @var $this CursoController */
/* @var $dataProvider CActiveDataProvider */

$this->menu=array(
	array('label'=>'Nuevo Curso', 'url'=>array('create')),
);
?>

<h1>Mis Cursos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
