<?php

/**
 * This is the model class for table "curso_estudiantes".
 *
 * The followings are the available columns in table 'curso_estudiantes':
 * @property integer $id_curso_estudiante
 * @property integer $id_curso
 * @property string $username_estudiante
 *
 * The followings are the available model relations:
 * @property CrugeUser $usernameEstudiante
 * @property Curso $idCurso
 */
class CursoEstudiantes extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CursoEstudiantes the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public $idEvaluaciones;
	public $nombreClases;
	
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'curso_estudiantes';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curso, username_estudiante', 'required'),
			array('id_curso', 'numerical', 'integerOnly'=>true),
			array('username_estudiante', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_curso_estudiante, id_curso, username_estudiante', 'safe', 'on'=>'search'),
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
			'usernameEstudiante' => array(self::BELONGS_TO, 'CrugeUser', 'username_estudiante'),
			'idCurso' => array(self::BELONGS_TO, 'Curso', 'id_curso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_curso_estudiante' => 'Id Curso Estudiante',
			'id_curso' => 'Id Curso',
			'username_estudiante' => 'Username Estudiante',
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

		$criteria->compare('id_curso_estudiante',$this->id_curso_estudiante);
		$criteria->compare('id_curso',$this->id_curso);
		$criteria->compare('username_estudiante',$this->username_estudiante,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}