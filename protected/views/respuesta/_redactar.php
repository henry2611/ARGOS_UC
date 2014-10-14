<?php
/* @var $this RespuestaController */
/* @var $model Respuesta */
/* @var $form CActiveForm */
?>



<span id="Boton_siguiente">
	<?php	if($tipo<3){ 
				echo CHtml::Button('Siguiente tipo de preguntas',array('submit'=>'../respuesta/redactar','params'=>array('id_evaluacion'=>$idEvaluacion,'id_tipo_pregunta'=>$tipo+1))); 
			}else{ 
				echo CHtml::Button('Finalizar',array('onclick'=>'nextPage();'));
			}?>
</span>
<div class="form">
	<?php $preguntas=Pregunta::model()->findAll(array('condition'=>'id_evaluacion=:param AND id_tipo_pregunta=:param1','params'=>array('param'=>$idEvaluacion,'param1'=>$tipo)));?>
	
	<?php
	foreach ($preguntas as $pregunta){
		$model->id_pregunta=$pregunta->id_pregunta;
		$preg=Pregunta::model()->findByPk($model->id_pregunta);
		$respuestas=Respuesta::model()->findAll(array('condition'=>'id_pregunta=:param','params'=>array('param'=>$model->id_pregunta)));
		$clasePregunta=ClasePregunta::model()->findByPk($preg->id_clase_pregunta);?>
	
	
<pre> </pre>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'redactar_'.$model->id_pregunta,
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'onsubmit'=>"return false;",/* Disable normal form submit */
	),
)); ?>


	<p class="note">Fields with <span class="required">*</span> are required.</p>
	<?php echo $form->errorSummary($model); ?>
	<h3><?php echo $preg->texto_pregunta;?></h3>(<?php echo $clasePregunta->nombre_clase_pregunta;?>)
	
	
	<div class="row" hidden>
		<?php echo $form->textField($model,'id_pregunta'); ?>
	</div>
	<div class="data", id="Respuestas_todas_<?php echo $model->id_pregunta; ?>"><h3>
		<?php foreach ($respuestas as $record) {
			if($preg->id_clase_pregunta!=4){
				echo "<li>".$record->texto_respuesta."</li>";
			}else{
				echo "<li>".$record->texto_respuesta_b." -- ".$record->texto_respuesta."</li>";
			}			
		}?></h3>
	</div>
	<?php //Seleccion simple y multiple ?>
	<?php if (($preg->id_clase_pregunta==1)||($preg->id_clase_pregunta==2)){?>
	<div class="row", id="Texto_respuesta_<?php echo $model->id_pregunta; ?>">
		<span style="float:left;width:50%;">
		<?php echo $form->labelEx($model,'texto_respuesta'); ?>
		<?php echo $form->textArea($model,'texto_respuesta',array('rows'=>4, 'cols'=>40,'id'=>'respuesta_texto_'.$model->id_pregunta)); ?>
		<?php echo $form->error($model,'texto_respuesta'); ?>
		</span>
		<span style="float:right;width:50%;">
		<?php //Yii::app()->request->cookies['Pregunta_'.$model->id_pregunta]=new CHttpCookie('Pregunta_'.$model->id_pregunta,0);?>
		<?php echo $form->labelEx($model,'tipo_respuesta'); ?>
		<?php $check = isset(Yii::app()->request->cookies['Pregunta_'.$preg->id_pregunta]) ? Yii::app()->request->cookies['Pregunta_'.$preg->id_pregunta]->value : '';?>
		<?php if ($check==0){
				 echo $form->dropDownList($model,'id_tipo_respuesta',array(1=>'Correcto'),array('empty'=>'Primero la respuesta correcta')); 
			}else{
				if ($preg->id_clase_pregunta==='1'){
					echo $form->dropDownList($model,'id_tipo_respuesta',array(2=>'Incorrecto'),array('empty'=>'Seleccione tipo de respuesta')); 
				}else{ 
					echo $form->dropDownList($model,'id_tipo_respuesta',CHTML::listData(TipoRespuesta::model()->findAll(),'id_tipo_respuesta','nombre_tipo_respuesta'),array('empty'=>'Seleccione tipo de respuesta')); 
				}
			}?>
		<?php echo $form->error($model,'id_tipo_respuesta'); ?>
		</span>
	</div>
	<?php //VERDADERO Y FALSO ?>
	<?php }else if(($preg->id_clase_pregunta==3)&&(!$respuestas)){?>
	<div class="row", id="Texto_respuesta_<?php echo $model->id_pregunta; ?>">
		<?php ?><span hidden>
		<?php $model->id_tipo_respuesta='1'; ?>
		<?php echo $form->textField($model,'id_tipo_respuesta'); ?>
		</span>
		<span style="float:left;width:50%;">
		<?php echo $form->labelEx($model,'texto_respuesta'); ?>
		<?php echo $form->dropDownList($model,'texto_respuesta',array('Verdadero'=>'Verdadero','Falso'=>'Falso')); ?>
		<?php echo $form->error($model,'texto_respuesta'); ?>
		</span>
	</div>
	<?php //PAREAMIENTO ?>
	<?php }else if ($preg->id_clase_pregunta==4){?>
	<div class="row", id="Texto_respuesta_<?php echo $model->id_pregunta; ?>">
		<span hidden>
		<?php $model->id_tipo_respuesta='1'; ?>
		<?php echo $form->textField($model,'id_tipo_respuesta'); ?>
		</span>
		<span style="float:left;width:50%;">
		<?php echo $form->labelEx($model,'texto_pregunta'); ?>
		<?php echo $form->textArea($model,'texto_respuesta_b',array('rows'=>3, 'cols'=>40,'id'=>'respuesta_texto_b'.$model->id_pregunta)); ?>
		<?php echo $form->error($model,'texto_respuesta_b'); ?>
		</span>
		<span style="float:right;width:50%;">
		<?php echo $form->labelEx($model,'texto_respuesta'); ?>
		<?php echo $form->textArea($model,'texto_respuesta',array('rows'=>3, 'cols'=>40,'id'=>'respuesta_texto'.$model->id_pregunta)); ?>
		<?php echo $form->error($model,'texto_respuesta'); ?>
		</span>
	</div>
	<?php }?>
	<?php if(($preg->id_clase_pregunta!=3)||(($preg->id_clase_pregunta==3)&&(!$respuestas))){?>
	<div class="row buttons" style="width:50%" id="Boton_respuesta_<?php echo $model->id_pregunta;?>">
		<?php echo CHtml::Button('Submit',array('onclick'=>'sendSubmit('.$model->id_pregunta.','.$preg->id_clase_pregunta.');')); ?>
	</div>
	<?php } ?>
<?php $this->endWidget();} ?>
<span id="Boton_siguiente">
	<?php	if($tipo<3){ 
				echo CHtml::Button('Siguiente tipo de preguntas',array('submit'=>'../respuesta/redactar','params'=>array('id_evaluacion'=>$idEvaluacion,'id_tipo_pregunta'=>$tipo+1))); 
			}else{ 
				echo CHtml::Button('Finalizar',array('onclick'=>'nextPage();'));
			}?>
</span>
</div><!-- form -->



<script type="text/javascript">

window.onload = function() {
    if(!window.location.hash) {
        window.location = window.location + '#loaded';
        window.location.reload();
    }
}
function sendSubmit(num,tipo) {
  var data=$("#redactar_"+num).serialize();
  $.ajax({
    type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("respuesta/redactar"); ?>',
    data:data,
    success:function(data){
		var li=$(data).find('li').length;
		if (tipo==3){
			$('#Texto_respuesta_'+num).fadeOut(800);
			$('#Boton_respuesta_'+num).fadeOut(800);
			
		}
      $('#respuesta_texto_'+num).val('');
      $('#respuesta_texto_b'+num).val('');
	  $('#Respuestas_todas_'+num).fadeOut(800, function(){
		$('#Respuestas_todas_'+num).html(data).fadeIn().delay(800);
		window.location.reload();
        });
    },
    error: function(data) { // if error occured
      alert("Error occured. Please try again");
    },
  });
}

function nextPage(){
		window.location="<?php echo Yii::app()->createAbsoluteUrl("evaluacion/view",array('id'=>$idEvaluacion));?>";
	
}
</script>