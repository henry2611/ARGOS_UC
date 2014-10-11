<?php

class EstudianteEvaluacionController extends Controller
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
				'actions'=>array('create','loadcursos'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'users'=>array('Docente','admin'),
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
		$model=new EstudianteEvaluacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['EstudianteEvaluacion']))
		{
			$model->attributes=$_POST['EstudianteEvaluacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_evaluacion_estudiante));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['EstudianteEvaluacion']))
		{
			$model->attributes=$_POST['EstudianteEvaluacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_evaluacion_estudiante));
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
		$id = Yii::app()->user->id;
		$user = Yii::app()->db->createCommand()->select('username')->from('cruge_user')
                ->where('iduser='.$id)->queryScalar();
		$criteria = new CDbCriteria;
		$criteria -> select = array('x.username_estudiante','t.id_evaluacion','t.id_curso_estudiante','t.calificacion','t.id_evaluacion_estudiante');
		$criteria -> join = 'LEFT JOIN Curso_Estudiantes x ON x.id_curso_estudiante=t.id_curso_estudiante ';
		$criteria -> condition = 'x.username_estudiante='."'".$user."'";
		$dataProvider=new CActiveDataProvider('EstudianteEvaluacion',array('criteria'=>$criteria));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new EstudianteEvaluacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['EstudianteEvaluacion']))
			$model->attributes=$_GET['EstudianteEvaluacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return EstudianteEvaluacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=EstudianteEvaluacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionLoadcursos()
	{
		$cursoestudiante = isset($_POST['id_curso_estudiante']) ? $_POST['id_curso_estudiante'] : '';
		$criteria= new CDbCriteria();
		$criteria->select='evaluacion.id_evaluacion AS idEvaluaciones , clase.nombre_clase AS nombreClases';
		$criteria->join ='LEFT JOIN curso ON curso.id_curso=t.id_curso ';
		$criteria->join .='LEFT JOIN tema ON tema.id_curso=curso.id_curso ';
		$criteria->join .='LEFT JOIN clase ON clase.id_tema=tema.id_curso ';
		$criteria->join .='INNER JOIN evaluacion ON (evaluacion.id_clase=clase.id_clase) AND (NOW() BETWEEN evaluacion.tiempo_inicio AND evaluacion.tiempo_final)';
		$criteria->condition= 't.id_curso_estudiante=:value';
		$criteria->params = array(":value"=>$cursoestudiante);
		
		$test=CursoEstudiantes::model()->findAll($criteria);
		
				
		if (is_array($test) ){
			foreach($test as $value=>$name){
				$criteria= new CDbCriteria();
				$criteria->select='t.*';
				$criteria-> condition = 't.id_evaluacion=:value AND t.id_curso_estudiante=:value2';
				$criteria->params = array(':value'=>$name['idEvaluaciones'],':value2'=>$cursoestudiante);
				$foo=EstudianteEvaluacion::model()->find($criteria);

				if(!$foo){
					echo CHtml::tag('option',
						array('value'=>''.$name['idEvaluaciones']),CHtml::encode($name['nombreClases']),true);
				}
            }
        } 
        else{
            echo CHtml::tag('option',
                    array('value'=>''.'0'),CHtml::encode('No se encontro evaluaciones'),true);
        }
		
	}
	

	/**
	 * Performs the AJAX validation.
	 * @param EstudianteEvaluacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='estudiante-evaluacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
