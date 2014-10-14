<?php

class RespuestaController extends Controller
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
				'actions'=>array('create','update','redactar'),
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
		$model=new Respuesta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Respuesta']))
		{
			$model->attributes=$_POST['Respuesta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_respuesta));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}
	
	public function actionRedactar()
	{
		$model=new Respuesta;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Respuesta']))
		{
			$model->attributes=$_POST['Respuesta'];
			$foo=$model->texto_respuesta_b;
			trim($foo);
			if(strlen($foo)==0){
				$foo=null;
			}
			$model->texto_respuesta_b=$foo;
			if($model->save()){
				$respuestas=Respuesta::model()->findAll(array('condition'=>'id_pregunta=:param','params'=>array('param'=>$model->id_pregunta)));
				$preg=Pregunta::model()->findByPk($model->id_pregunta);
				if(($preg->id_clase_pregunta==1)||($preg->id_clase_pregunta)){
					setcookie("Pregunta_".$preg->id_pregunta,1,time()+3600);
				}
				echo "<h3>";
				foreach ($respuestas as $record) {
					if($preg->id_clase_pregunta!=4){
						echo "<li>".$record->texto_respuesta."</li>";
					}else{
						echo "<li>".$record->texto_respuesta_b." -- ".$record->texto_respuesta."</li>";
					}	
				}
				echo "</h3>"; 
			}
		}
		else{
			$idEvaluacion=isset($_POST['id_evaluacion']) ? $_POST['id_evaluacion'] : '';
			$tipo=isset($_POST['id_tipo_pregunta']) ? $_POST['id_tipo_pregunta'] : '';
			$this->render('redactar',array(
				'model'=>$model,'idEvaluacion'=>$idEvaluacion,'tipo'=>$tipo,
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

		if(isset($_POST['Respuesta']))
		{
			$model->attributes=$_POST['Respuesta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_respuesta));
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
		$dataProvider=new CActiveDataProvider('Respuesta');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Respuesta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Respuesta']))
			$model->attributes=$_GET['Respuesta'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Respuesta the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Respuesta::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Respuesta $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='respuesta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
