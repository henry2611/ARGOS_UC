<?php

class EvaluacionController extends Controller
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
				'actions'=>array('index','view','notas'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','loadcursos'),
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
		$model=new Evaluacion;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Evaluacion']))
		{
			$model->attributes=$_POST['Evaluacion'];
			if($model->save())
				Yii::app()->session['id_evaluacion'] = $model->id_evaluacion;
				Yii::app()->session['id_tipo_pregunta'] = '1';
				$this->redirect(array('/pregunta/redactar'));
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

		if(isset($_POST['Evaluacion']))
		{
			$model->attributes=$_POST['Evaluacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_evaluacion));
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
		$criteria -> select = array('z.username_docente','t.id_clase','t.id_evaluacion','t.porcentaje','t.tiempo_inicio','t.tiempo_final');
		$criteria -> join = 'LEFT JOIN Clase x ON x.id_clase=t.id_clase ';
		$criteria -> join .='LEFT JOIN Tema y ON y.id_tema=x.id_tema ';
		$criteria -> join .='LEFT JOIN Curso z ON z.id_curso=y.id_curso ';
		if(isset($_POST['id_curso'])){
			$criteria -> condition = 'z.id_curso='."'".$_POST['id_curso']."'".' AND z.username_docente='."'".$user."'";
		}else{
			$criteria -> condition = 'z.username_docente='."'".$user."'";
		}
		$dataProvider=new CActiveDataProvider('Evaluacion',array('criteria'=>$criteria));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}
	
	public function actionNotas()
	{
		if(isset($_POST['id_evaluacion'])){
			$idEvaluacion=$_POST['id_evaluacion'];
			$criteria = new CDbCriteria;
			$criteria -> select = array('y.username_estudiante AS usernameEstudiante','t.calificacion', 't.id_evaluacion');
			//$criteria -> join = 'LEFT JOIN Estudiante_Evaluacion x ON x.id_evaluacion=t.id_evaluacion ';
			$criteria -> join = 'LEFT JOIN Curso_Estudiantes y ON y.id_curso_estudiante=t.id_curso_estudiante ';
			$criteria -> condition = 't.id_evaluacion='."'".$idEvaluacion."'";
			$model=EstudianteEvaluacion::model()->findAll($criteria);  
			$this->render('notas',array(
			'model'=>$model,
			));
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Evaluacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Evaluacion']))
			$model->attributes=$_GET['Evaluacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Evaluacion the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Evaluacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	
	public function actionLoadcursos()
	{
		$curso = isset($_POST['id_curso']) ? $_POST['id_curso'] : '';
		$criteria= new CDbCriteria();
		$criteria->select='clase.id_clase AS idClase , clase.nombre_clase AS nombreClase';
		//$criteria->join ='LEFT JOIN curso ON curso.id_curso=t.id_curso ';
		$criteria->join ='LEFT JOIN tema ON tema.id_curso=t.id_curso ';
		$criteria->join .='LEFT JOIN clase ON clase.id_tema=tema.id_tema ';
		$criteria->condition= 't.id_curso=:value';
		$criteria->params = array(":value"=>$curso);
		
		$test=Curso::model()->findAll($criteria);
		
				
		if (is_array($test) ){
			foreach($test as $value=>$name){
					echo CHtml::tag('option',
						array('value'=>''.$name['idClase']),CHtml::encode($name['nombreClase']),true);
            }
        } 
        else{
            echo CHtml::tag('option',
                    array('value'=>''.'0'),CHtml::encode('No se encontro temas'),true);
        }
		
	}

	/**
	 * Performs the AJAX validation.
	 * @param Evaluacion $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='evaluacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
