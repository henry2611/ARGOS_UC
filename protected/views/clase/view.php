<?php
/* @var $this ClaseController */
/* @var $model Clase */

$this->breadcrumbs=array(
	'Clases'=>array('index'),
	$model->id_clase,
);

$this->menu=array(
	array('label'=>'List Clase', 'url'=>array('index')),
	array('label'=>'Create Clase', 'url'=>array('create')),
	array('label'=>'Update Clase', 'url'=>array('update', 'id'=>$model->id_clase)),
	array('label'=>'Delete Clase', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_clase),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Clase', 'url'=>array('admin')),
);
?>

<h1>View Clase #<?php echo $model->id_clase; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_clase',
		'id_tema',
		'nombre_tema',
		'descripcion_clase',
	),
)); ?>

<?php
    /*$this->widget('ext.coco.CocoWidget'
        ,array(
            'id'=>'cocowidget1',
            'onCompleted'=>'function(id,filename,jsoninfo){  }',
            'onCancelled'=>'function(id,filename){ alert("cancelled"); }',
            'onMessage'=>'function(m){ alert(m); }',
            'allowedExtensions'=>array('ppt'),
            'sizeLimit'=>2000000,
            'uploadDir' => 'Resources/',
            // para recibir el archivo subido:
            'receptorClassName'=>'application.models.Clase',
            'methodName'=>'onFileUploaded',
            'userdata'=>'Yii::app()->user->id',
            'buttonText'=>'Cargar Diapositiva',
        ));*/
   ?>
    <br/>
    
   <?php
        $diapositivas = "Agregar Diapositivas";
        $r = new Recurso;
        echo CHtml::link($diapositivas, array('recurso/index','id'=>$model->id_clase));
   ?>
    

