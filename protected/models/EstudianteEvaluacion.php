<?php

/**
 * This is the model class for table "estudiante_evaluacion".
 *
 * The followings are the available columns in table 'estudiante_evaluacion':
 * @property integer $id_evaluacion_estudiante
 * @property integer $id_evaluacion
 * @property integer $id_curso_estudiante
 * @property integer $calificacion
 *
 * The followings are the available model relations:
 * @property CursoEstudiantes $idCursoEstudiante
 * @property Evaluacion $idEvaluacion
 * @property RespuestaEstudiante[] $respuestaEstudiantes
 */
class EstudianteEvaluacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EstudianteEvaluacion the static model class
	 */
	public $prueba;
	public $usernameEstudiante;
	public $calificacion;
	
	
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'estudiante_evaluacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_evaluacion, id_curso_estudiante', 'required'),
			array('id_evaluacion, id_curso_estudiante, calificacion', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_evaluacion_estudiante, id_evaluacion, id_curso_estudiante, calificacion', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'idCursoEstudiante' => array(self::BELONGS_TO, 'CursoEstudiantes', 'id_curso_estudiante'),
			'idEvaluacion' => array(self::BELONGS_TO, 'Evaluacion', 'id_evaluacion'),
			'respuestaEstudiantes' => array(self::HAS_MANY, 'RespuestaEstudiante', 'id_estudiante_evaluacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_evaluacion_estudiante' => 'Id Evaluacion Estudiante',
			'id_evaluacion' => 'Id Evaluacion',
			'id_curso_estudiante' => 'Id Curso Estudiante',
			'calificacion' => 'Calificacion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_evaluacion_estudiante',$this->id_evaluacion_estudiante);
		$criteria->compare('id_evaluacion',$this->id_evaluacion);
		$criteria->compare('id_curso_estudiante',$this->id_curso_estudiante);
		$criteria->compare('calificacion',$this->calificacion);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}