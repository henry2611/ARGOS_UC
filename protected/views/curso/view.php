<?php
/* @var $this CursoController */
/* @var $model Curso */

$this->breadcrumbs=array(
	'Cursos'=>array('index'),
	//$model->id_curso,
        
);

$this->menu=array(
	//array('label'=>'List Curso', 'url'=>array('index')),
	//array('label'=>'Create Curso', 'url'=>array('create')),
	array('label'=>'Update Curso', 'url'=>array('update', 'id'=>$model->id_curso)),
	array('label'=>'Delete Curso', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_curso),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Lista de Temas', 'url'=>array('temas', 'id'=>$model->id_curso)),
        array('label'=>'Lista de Estudiantes', 'url'=>array('view', 'id'=>$model->id_curso)),
);
?>

<h1>Vista Detalle de <?php echo $model->nombre_curso; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nombre_curso',
		'descripcion_curso',
		'username_docente',
		'numero_estudiantes',
	),
)); ?>

<div class="row buttons">
		<?php echo CHtml::Button('Evaluaciones',array('submit'=>'../evaluacion/','params'=>array('id_curso'=>$model->id_curso))); ?>
</div>
