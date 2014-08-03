<?php
/* @var $this RespuestaEstudianteController */
/* @var $model RespuestaEstudiante */
/* @var $form CActiveForm */
?>

<div class="form">



	<?php $foo=EstudianteEvaluacion::model()->findByPk($model->id_estudiante_evaluacion);
		$evaluacion=Evaluacion::model()->findByPk($foo->id_evaluacion);
		$preguntas=Pregunta::model()->findAll(array('condition'=>'id_evaluacion=:value AND id_tipo_pregunta=:value2','params'=>array(':value'=>$foo->id_evaluacion,':value2'=>$tipo_pregunta)));
		$count=count($preguntas);
		
		$numbers = range(0, $count-1);
		shuffle($numbers);
		
		$i=0;
		if($tipo_pregunta=='1'){
			$maxpreguntas=$evaluacion->cant_dificil;
		}elseif ($tipo_pregunta=='2'){
			$maxpreguntas=$evaluacion->cant_intermedio;
		}else{
			$maxpreguntas=$evaluacion->cant_facil;
		}
	?>
	<span id="Boton_siguiente">
		<?php if($tipo_pregunta<3){
				echo CHtml::Button('Siguiente tipo de pregunta',array('submit'=>'../respuestaestudiante/create','params'=>array('id_estudiante_evaluacion'=>$model->id_estudiante_evaluacion,'tipo_pregunta'=>$tipo_pregunta+1))); 
			}else{ 
				echo CHtml::Button('Finalizar',array('onclick'=>'nextPage();'));
			}?>
	</span>	
	<?php
		while ($i<$maxpreguntas){
			$model->id_pregunta=$preguntas[$numbers[$i]]->id_pregunta;
			$preg=Pregunta::model()->findByPk($model->id_pregunta);
			$respuestas=Respuesta::model()->findAll(array('condition'=>'id_pregunta=:param','params'=>array('param'=>$model->id_pregunta)));
			shuffle($respuestas);
			$clasePregunta=ClasePregunta::model()->findByPk($preg->id_clase_pregunta);
	?>
	
<br><br>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'respuesta-estudiante_'.$model->id_pregunta,
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array(
		'onsubmit'=>"return false;",/* Disable normal form submit */
	),
)); ?>
	
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
	<h3><?php echo $preg->texto_pregunta;?></h3>(<?php echo CHTML::encode($clasePregunta->nombre_clase_pregunta);?>)
	</div>
	
	<div class="row" hidden>
		<?php echo $form->textField($model,'id_estudiante_evaluacion'); ?>
	</div>

	<div class="row" hidden>
		<?php echo $form->textField($model,'id_pregunta'); ?>
	</div>
	

	<?php if ($preg->id_clase_pregunta==1){?>
	<div class="row">
		<?php echo $form->labelEx($model,'texto_respuesta'); ?>
		<?php echo $form->dropDownList($model,'texto_respuesta',CHTML::listData($respuestas,'texto_respuesta','texto_respuesta'),array('empty'=>'Seleccione una respuesta')); ?>
		<?php echo $form->error($model,'texto_respuesta'); ?>
	</div>
	<?php }elseif ($preg->id_clase_pregunta==2){?>
	<div class="row" >
		<?php echo $form->labelEx($model,'texto_respuesta'); ?>
		<?php echo $form->checkBoxList($model,'texto_respuesta',CHTML::listData($respuestas,'texto_respuesta','texto_respuesta'),array('labelOptions'=>array('style'=>"display:inline-block"))); ?>
		<?php echo $form->error($model,'texto_respuesta'); ?>
	</div>
	<?php }elseif ($preg->id_clase_pregunta==3){?>
	<div class="row">
		<?php echo $form->labelEx($model,'texto_respuesta'); ?>
		<?php echo $form->dropDownList($model,'texto_respuesta',array('Verdadero'=>'Verdadero','Falso'=>'Falso'),array('empty'=>'Seleccione una respuesta')); ?>
		<?php echo $form->error($model,'texto_respuesta'); ?>
	</div>
	<?php }elseif ($preg->id_clase_pregunta==4){?>
	
	<div class="row", id="RespuestaPareamiento"><?php
		foreach ($respuestas as $respuesta){
			echo $respuesta->texto_respuesta.' ';
		}
	
		shuffle($respuestas);
		foreach ($respuestas as $respuesta){
			echo $respuesta->texto_respuesta_b.' ';
		}
		
	?></div>
	<div class="row" >
		<span style="float:left;width:50%;">
		<?php echo $form->labelEx($model,'texto_respuesta'); ?>
		<div id="texto_respuesta" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>	
		</span>
		<span style="float:right;width:50%;">
		<?php echo $form->labelEx($model,'texto_respuesta'); ?>
		<div id="texto_respuesta_b" ondrop="drop(event)" ondragover="allowDrop(event)" ></div>
		</span>
	</div>
	<br>
	<?php /*<div class="row" >
		<?php echo $form->labelEx($model,'texto_respuesta'); ?>
		<?php echo $form->textArea($model,'texto_respuesta',array('id'=>"texto_respuesta",'ondrop'=>"drop(event)" ,'ondragover'=>"allowDrop(event)")); ?>
		<?php echo $form->error($model,'texto_respuesta'); ?>
	</div>
	<div class="row" ondrop="drop(event)" ondragover="allowDrop(event)">
		<?php echo $form->labelEx($model,'texto_respuesta_b'); ?>
		<?php echo $form->textField($model,'texto_respuesta_b'); ?>
		<?php echo $form->error($model,'texto_respuesta_b'); ?>
	</div> */?>
	<?php }
	if($preg->id_clase_pregunta==4){?>
	<div class="row buttons" style="width:50%" id="Boton_respuesta_<?php echo $model->id_pregunta;?>">
		<?php echo CHtml::Button('Submit',array('onclick'=>'sendSubmitPareo('.$model->id_pregunta.');')); ?>
	</div>
	
	<?php }else{?>
	<div class="row buttons" style="width:50%" id="Boton_respuesta_<?php echo $model->id_pregunta;?>">
		<?php echo CHtml::Button('Submit',array('onclick'=>'sendSubmit('.$model->id_pregunta.');')); ?>
	</div>

<?php }$this->endWidget();
	$i++;} ?>

</div><!-- form -->


<script type="text/javascript">
function sendSubmit(num) {
  var data=$("#respuesta-estudiante_"+num).serialize();
  $.ajax({
    type: 'POST',
    url: '<?php echo Yii::app()->createAbsoluteUrl("respuestaestudiante/create"); ?>',
    data:data,
    success:function(data){
		
	  $('#Boton_respuesta_'+num).fadeOut(800);
    },
    error: function(data) { // if error occured
      alert("Error occured.please try again");
    },
  });
}

function sendSubmitPareo(num) {
  var data=$("#respuesta-estudiante_"+num).serialize();
  var text="RespuestaEstudiante%5Btexto_respuesta%5D="+document.getElementById("texto_respuesta").textContent;
  var text2="RespuestaEstudiante%5Btexto_respuesta_b%5D="+document.getElementById("texto_respuesta_b").textContent;
  if($('#texto_respuesta_b:empty').length){
	data2=data+"&"+text.trim();
  }else{
	data2=(data+"&"+text.trim()+"&"+text2.trim());
  }
  $.ajax({
	type: 'POST',
	url: '<?php echo Yii::app()->createAbsoluteUrl("respuestaestudiante/create"); ?>',
	data:data2,
	success:function(data){
		$("#texto_respuesta").html("");
		$("#texto_respuesta_b").html("");
		
	  //$('#Boton_respuesta_'+num).fadeOut(800);
	},
	error: function(data) { // if error occured
		alert("Error occured. Please try again");
	},
  });
}

window.addEventListener('DOMContentLoaded', splitWords, false);
function splitWords() {

    var elems = document.querySelectorAll('#RespuestaPareamiento'),
        text,
        textNode,
        words,
        elem;

    // iterate through all .draggable elements
    for (var i = 0, l = elems.length; i < l; i++) {

        elem = elems[i]; 
        textNode = elem.childNodes[0];
        text = textNode.nodeValue;

        // remove current text node
        elem.removeChild(textNode);      
        words = text.split(' ');

      // iterate through words
      for (var k = 0, ll = words.length; k < ll; k++) {
         // create node for all words
         textNode = document.createElement('span');
         textNode.id = 'word_' + i + k;
         // allow dragging for words
         textNode.draggable = true;
         textNode.ondragstart = drag;
         textNode.appendChild(document.createTextNode(words[k] + ' '));
         elem.appendChild(textNode)
      }
 
    }
    
  }
  
function allowDrop(ev)
{
	ev.preventDefault();
}

function drag(ev)
{
	ev.dataTransfer.setData("Text",ev.target.id);
	console.log('targetid: ' + ev.target.id);
}

function drop(ev)
{
	ev.preventDefault();
	var data=ev.dataTransfer.getData("Text");
	ev.target.appendChild(document.getElementById(data));
}

function nextPage(){
		window.location="<?php echo Yii::app()->createAbsoluteUrl("estudianteevaluacion/view",array('id'=>$model->id_estudiante_evaluacion));?>";
	
}

</script>

<style type="text/css">
#texto_respuesta {width:70%;height:40px;padding:10px;border:1px solid #aaaaaa;}
#texto_respuesta_b {width:70%;height:40px;padding:10px;border:1px solid #aaaaaa;}
</style>