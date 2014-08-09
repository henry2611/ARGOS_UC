<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
?>

<div class="form" >
<?php $evaluacion=Evaluacion::model()->findByPk($model->id_evaluacion);?>
<?php $preguntas=Pregunta::model()->findAll(array('condition'=>'id_evaluacion=:param AND id_tipo_pregunta=:param1','params'=>array('param'=>$model->id_evaluacion,'param1'=>$model->id_tipo_pregunta)));?>
<?php $tipo=$model->id_tipo_pregunta;?>
<?php if($model->id_tipo_pregunta==1){
		$cant_minima=$evaluacion->cant_dificil;
	}elseif($model->id_tipo_pregunta==2) {
		$cant_minima=$evaluacion->cant_intermedio;
	}elseif($model->id_tipo_pregunta==3){
		$cant_minima=$evaluacion->cant_facil;}
	?>

<span id="Boton_siguiente" <?php if ($cant_minima>(count ($preguntas))){echo "hidden";}?>>
		<?php	if($tipo<3){ 
					echo CHtml::Button('Siguiente tipo de pregunta',array('submit'=>'../pregunta/redactar','params'=>array('id_evaluacion'=>$model->id_evaluacion,'id_tipo_pregunta'=>$tipo+1))); 
				}else{ 
					echo CHtml::Button('Crear respuestas',array('submit'=>'../respuesta/redactar','params'=>array('id_evaluacion'=>$model->id_evaluacion,'id_tipo_pregunta'=>'1')));
				}?>
		</span>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'redactar',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'onsubmit'=>"return false;",/* Disable normal form submit */
		),
)); ?>




	<p><h3>Cantidad minima de preguntas: <id="Cantidad_minima"><?php echo CHtml::encode($cant_minima);?></id></h3>
	
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model);?>
	
	<div class="row" hidden>
		<?php echo $form->textField($model,'id_evaluacion'); ?>
	</div>

	<div class="row" hidden>
		<?php echo $form->textField($model,'id_tipo_pregunta'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->labelEx($model,'clase_pregunta'); ?>
		<?php echo $form->dropDownList($model,'id_clase_pregunta',CHTML::listData(ClasePregunta::model()->findAll(),'id_clase_pregunta','nombre_clase_pregunta'),array('empty'=>'Seleccione tipo de pregunta')); ?>
		<?php echo $form->error($model,'id_clase_pregunta'); ?>
	</div>
	
	<div class="row", id="textField">
		<?php echo $form->labelEx($model,'texto_pregunta'); ?>
		<?php echo $form->textArea($model,'texto_pregunta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto_pregunta'); ?>
	</div>
	
	<div class="row buttons">
		<span>
		<?php echo CHtml::Button('Submit',array('onclick'=>'sendSubmit();')); ?>
		</span>
	</div>
	
	<pre> </pre>
	<div class="data", id="Preguntas_todas"><h3>
		<?php foreach ($preguntas as $record) {
			echo "<li>".$record->texto_pregunta."</li>"; 
		}?></h3>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script type="text/javascript">
function sendSubmit() {
  var data=$("#redactar").serialize();
  var num2="<?php echo $cant_minima?>";	
  $.ajax({
    type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("pregunta/redactar");?>',
    data:data,
    success:function(data){
		var num=$(data).find('li').length;	
		if (num>=num2){
			$('#Boton_siguiente').show(800);
		}
      $('#Pregunta_texto_pregunta').val('');
	  $('#Preguntas_todas').fadeOut(800, function(){
		$('#Preguntas_todas').html(data).fadeIn().delay(800);

        });
    },
    error: function(data) { // if error occured
      alert("Error occured. Please try again");
    },
  });
}

function nextPage(){
	window.location="<?php echo Yii::app()->createAbsoluteUrl("respuesta/redactar",array('id'=>$model->id_evaluacion,'tipo'=>'1'));?>";
}
</script>