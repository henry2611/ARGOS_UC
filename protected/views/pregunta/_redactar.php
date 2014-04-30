<?php
/* @var $this PreguntaController */
/* @var $model Pregunta */
/* @var $form CActiveForm */
?>

<div class="form" >

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'redactar',
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'onsubmit'=>"return false;",/* Disable normal form submit */
		'onkeypress'=>" if(event.keyCode == 13){ sendSubmit(); }"
),)); ?>


<?php $evaluacion=Evaluacion::model()->find($model->id_evaluacion);?>
<?php $preguntas=Pregunta::model()->findAll(array('condition'=>'id_evaluacion=:param AND id_tipo_pregunta=:param1','params'=>array('param'=>$model->id_evaluacion,'param1'=>$model->id_tipo_pregunta)));?>
<?php $tipo=$model->id_tipo_pregunta;?>
<?php if($model->id_tipo_pregunta==1){
		$cant_minima=$evaluacion->cant_dificil;
	}elseif($model->id_tipo_pregunta==2) {
		$cant_minima=$evaluacion->cant_intermedio;
	}elseif($model->id_tipo_pregunta==3){
		$cant_minima=$evaluacion->cant_facil;}
	?>

	<p><h3>Cantidad minima de preguntas: <id="Cantidad_minima"><?php echo CHtml::encode($cant_minima);?></id></h3>
	
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model);?>
	

	<div class="row", id="textField">
		<?php echo $form->labelEx($model,'texto_pregunta'); ?>
		<?php echo $form->textArea($model,'texto_pregunta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'texto_pregunta'); ?>
	</div>

	<div class="row buttons">
		<span>
		<?php echo CHtml::Button('Submit',array('onclick'=>'sendSubmit();')); ?>
		</span>
		<span id="Boton_siguiente" <?php if ($cant_minima>(count ($preguntas))){echo "hidden";}?>>
		<?php 	if ($tipo<4){
					$tipo++;
					echo CHtml::Button('Siguiente tipo de Pregunta',array('onclick'=>'nextPage();'));
				}?>
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

<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script type="text/javascript">
function sendSubmit() {
  var data=$("#redactar").serialize();
  var num2="<?php echo $cant_minima?>";	
  $.ajax({
    type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("pregunta/redactar",array('id'=>$model->id_evaluacion,'tipo'=>$model->id_tipo_pregunta)); ?>',
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
      alert("Error occured.please try again");
    },
  });
}

function nextPage(){
	if (<?php echo $tipo ?><4){ 
		window.location="<?php echo ($model->id_evaluacion."?tipo=".$tipo);?>";
		
		
	}else{
		window.location="<?php echo Yii::app()->createAbsoluteUrl("respuesta/create",array('id'=>$model->id_evaluacion));?>";
	}
}
</script>