<?php
/* @var $this ClasePreguntaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Clase Preguntas',
);

$this->menu=array(
	array('label'=>'Create ClasePregunta', 'url'=>array('create')),
	array('label'=>'Manage ClasePregunta', 'url'=>array('admin')),
);
?>

<h1>Clase Preguntas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
