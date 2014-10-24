<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>¡Bienvenido al Sistema de Videoconferencias <i><?php echo CHtml::encode(Yii::app()->name); ?></i>!</h1>

<p>Nuestro sistema virtual de videoconferencias ARGOS, tiene como objetivo brindar a nuestra comunidad
   universitaria una herramienta de trabajo colaborativo para apoyar las actividades de clase.</p>

<p>Para acceder a los cursos que aquí se administran debes Utilizar tu identificación en ALFA. 
   Cualquier información, envía un correo a: <a href="mailto:<webmaster-facyt@uc.edu.ve>">WEBMASTER</a>. 
</p>

<p>You may change the content of this page by modifying the following two files:</p>
<ul>
	<li>View file: <code><?php echo __FILE__; ?></code></li>
	<li>Layout file: <code><?php echo $this->getLayoutFile('main'); ?></code></li>
</ul>
<?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
<?php
		$id = Yii::app()->user->id;
		$user = Yii::app()->db->createCommand()->select('username')->from('cruge_user')
                ->where('iduser='.$id)->queryScalar();
		$criteria= new CDbCriteria();
		$criteria->select='evaluacion.id_evaluacion AS idEvaluaciones , clase.nombre_clase AS nombreClases';
		$criteria->join ='LEFT JOIN curso ON curso.id_curso=t.id_curso ';
		$criteria->join .='LEFT JOIN tema ON tema.id_curso=curso.id_curso ';
		$criteria->join .='LEFT JOIN clase ON clase.id_tema=tema.id_curso ';
		$criteria->join .='INNER JOIN evaluacion ON (evaluacion.id_clase=clase.id_clase) AND (NOW() BETWEEN evaluacion.tiempo_inicio AND evaluacion.tiempo_final) ';
		$criteria->join .='LEFT JOIN estudiante_evaluacion ON estudiante_evaluacion.id_evaluacion=evaluacion.id_evaluacion';
		$criteria->condition= 't.username_estudiante=:value AND estudiante_evaluacion.calificacion IS NULL';
		$criteria->params = array(":value"=>$user);
		
		$test=CursoEstudiantes::model()->findAll($criteria);
		
		$check=Yii::app()->db->createCommand()->select('itemname')->from('cruge_authassignment')
                ->where('userid='.$id)->queryScalar();
		if (($check=='Estudiante')&&(!$test)){
			if(Yii::app()->user->hasFlash('success')){
				$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
					'id'=>'mydialog',
					// additional javascript options for the dialog plugin
					'options'=>array(
					'title'=>'IMPORTANTE',
					'autoOpen'=>true,
					'modal'=>true,		
					),
				));
				echo 'NO POSEE EVALUACIONES PENDIENTES';

			$this->endWidget('zii.widgets.jui.CJuiDialog');
			}
		}elseif (($check=='Estudiante')&&($test)){
			if(Yii::app()->user->hasFlash('failure')){
				$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
					'id'=>'mydialog',
					// additional javascript options for the dialog plugin
					'options'=>array(
					'title'=>'IMPORTANTE',
					'autoOpen'=>true,
					'modal'=>true,		
					),
				));
				echo 'POSEE EVALUACIONES PENDIENTES';

			$this->endWidget('zii.widgets.jui.CJuiDialog');
			}
		}?>
		