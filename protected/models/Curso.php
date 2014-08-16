<?php

/**
 * This is the model class for table "curso".
 *
 * The followings are the available columns in table 'curso':
 * @property integer $id_curso
 * @property string $nombre_curso
 * @property string $descripcion_curso
 * @property string $username_docente
 * @property integer $numero_estudiantes
 *
 * The followings are the available model relations:
 * @property CrugeUser $usernameDocente
 * @property CursoEstudiantes[] $cursoEstudiantes
 * @property Tema[] $temas
 */
class Curso extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Curso the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	
	public $nombreClase;
	public $idClase;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'curso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_curso, username_docente', 'required'),
			array('numero_estudiantes', 'numerical', 'integerOnly'=>true),
			array('nombre_curso, username_docente', 'length', 'max'=>64),
			array('descripcion_curso', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_curso, nombre_curso, descripcion_curso, username_docente, numero_estudiantes', 'safe', 'on'=>'search'),
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
			'usernameDocente' => array(self::BELONGS_TO, 'CrugeUser', 'username_docente'),
			'cursoEstudiantes' => array(self::HAS_MANY, 'CursoEstudiantes', 'id_curso'),
			'temas' => array(self::HAS_MANY, 'Tema', 'id_curso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_curso' => 'Id Curso',
			'nombre_curso' => 'Nombre Curso',
			'descripcion_curso' => 'Descripcion Curso',
			'username_docente' => 'Username Docente',
			'numero_estudiantes' => 'Numero Estudiantes',
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

		$criteria->compare('id_curso',$this->id_curso);
		$criteria->compare('nombre_curso',$this->nombre_curso,true);
		$criteria->compare('descripcion_curso',$this->descripcion_curso,true);
		$criteria->compare('username_docente',$this->username_docente,true);
		$criteria->compare('numero_estudiantes',$this->numero_estudiantes);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}