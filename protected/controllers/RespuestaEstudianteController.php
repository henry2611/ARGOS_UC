<?php

class RespuestaEstudianteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		/*return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);*/
		return array(array('CrugeAccessControlFilter'));
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new RespuestaEstudiante;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RespuestaEstudiante'])){
			$model->attributes=$_POST['RespuestaEstudiante'];
			
			if(is_array($_POST['RespuestaEstudiante']['texto_respuesta'])){
				$respuestas=$_POST['RespuestaEstudiante']['texto_respuesta'];
				foreach($respuestas as $respuesta){
					$model->id_respuesta_estudiante=null;
					$model->texto_respuesta=$respuesta;
					$model->isNewRecord = true;
					if($model->save()){
						$estudianteevaluacion=EstudianteEvaluacion::model()->findByPk($model->id_estudiante_evaluacion);
						$evaluacion=Evaluacion::model()->findByPk($estudianteevaluacion->id_evaluacion);
						$preg=Pregunta::model()->findByPK($model->id_pregunta);
						$resp=Respuesta::model()->findAll(array('condition'=>'id_pregunta=:param AND id_tipo_respuesta=:param2','params'=>array(':param'=>$model->id_pregunta,':param2'=>'1')));
						$count=count($resp);
						foreach ($resp as $check){
							$a=$check->texto_respuesta;
							
							$c=$model->texto_respuesta;
							
							if($a===$c){
								if(($preg->id_tipo_pregunta=='1')&&($check->id_tipo_respuesta=='1')){
									$estudianteevaluacion->calificacion=$estudianteevaluacion->calificacion+($evaluacion->puntuacion_dificil)/$count;
								}elseif(($preg->id_tipo_pregunta=='2')&&($check->id_tipo_respuesta=='1')){
									$estudianteevaluacion->calificacion=$estudianteevaluacion->calificacion+($evaluacion->puntuacion_intermedio)/$count;
								}elseif(($preg->id_tipo_pregunta=='3')&&($check->id_tipo_respuesta=='1')){
									$estudianteevaluacion->calificacion=$estudianteevaluacion->calificacion+($evaluacion->puntuacion_facil)/$count;
								}
								$estudianteevaluacion->save();
							}
						}
					}
				}
			}else{
				if($model->save()){
					$estudianteevaluacion=EstudianteEvaluacion::model()->findByPk($model->id_estudiante_evaluacion);
					$evaluacion=Evaluacion::model()->findByPk($estudianteevaluacion->id_evaluacion);
					$preg=Pregunta::model()->findByPK($model->id_pregunta);
					$resp=Respuesta::model()->findAll(array('condition'=>'id_pregunta=:param','params'=>array('param'=>$model->id_pregunta)));
					foreach ($resp as $check){
						$a=$check->texto_respuesta;
						$c=$model->texto_respuesta;
							
						if($preg->id_clase_pregunta=='4'){
							$b=$check->texto_respuesta_b;
							$d=$model->texto_respuesta_b;
							$count=count($resp);
							if(strlen(trim($b))==0){
								$b='0';
							}
							if(strlen(trim($d))==0){
								$d='0';
							}
							if((($a===$c)&&($b===$d))||(($a===$d)&&($b===$c))){
								if($preg->id_tipo_pregunta=='1'){
									$estudianteevaluacion->calificacion=$estudianteevaluacion->calificacion+($evaluacion->puntuacion_dificil)/$count;
								}elseif($preg->id_tipo_pregunta=='2'){
									$estudianteevaluacion->calificacion=$estudianteevaluacion->calificacion+($evaluacion->puntuacion_intermedio)/$count;
								}elseif($preg->id_tipo_pregunta=='3'){
									$estudianteevaluacion->calificacion=$estudianteevaluacion->calificacion+($evaluacion->puntuacion_facil)/$count;
								}
							}
							$estudianteevaluacion->save();
								
						}else{
							if($a===$c){
								if(($preg->id_tipo_pregunta=='1')&&($check->id_tipo_respuesta=='1')){
									$estudianteevaluacion->calificacion=$estudianteevaluacion->calificacion+$evaluacion->puntuacion_dificil;
								}elseif(($preg->id_tipo_pregunta=='2')&&($check->id_tipo_respuesta=='1')){
									$estudianteevaluacion->calificacion=$estudianteevaluacion->calificacion+$evaluacion->puntuacion_intermedio;
								}elseif(($preg->id_tipo_pregunta=='3')&&($check->id_tipo_respuesta=='1')){
									$estudianteevaluacion->calificacion=$estudianteevaluacion->calificacion+$evaluacion->puntuacion_facil;
								}
							}
							$estudianteevaluacion->save();
						}
					}
				}
			}
		}
		else{
			$model->id_estudiante_evaluacion=isset($_POST['id_estudiante_evaluacion']) ? $_POST['id_estudiante_evaluacion'] : '';
			$tipoPregunta=isset($_POST['tipo_pregunta']) ? $_POST['tipo_pregunta'] : '';
			$this->render('create',array(
				'model'=>$model,'tipo_pregunta'=>$tipoPregunta,
			));
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['RespuestaEstudiante']))
		{
			$model->attributes=$_POST['RespuestaEstudiante'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_respuesta_estudiante));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('RespuestaEstudiante');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new RespuestaEstudiante('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['RespuestaEstudiante']))
			$model->attributes=$_GET['RespuestaEstudiante'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	public function actionExamen()
	{
		$model=new RespuestaEstudiante;
		
		$model->id_estudiante_evaluacion=isset($_POST['id_evaluacion_estudiante']) ? $_POST['id_evaluacion_estudiante'] : '';
		
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return RespuestaEstudiante the loaded model
	 * @throws CHttpException
	 */
	 
	public function loadModel($id)
	{
		$model=RespuestaEstudiante::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param RespuestaEstudiante $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='respuesta-estudiante-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
