<?php

/**
 * This is the model class for table "respuesta_estudiante".
 *
 * The followings are the available columns in table 'respuesta_estudiante':
 * @property integer $id_respuesta_estudiante
 * @property integer $id_estudiante_evaluacion
 * @property integer $id_respuesta
 *
 * The followings are the available model relations:
 * @property Respuesta $idRespuesta
 * @property EstudianteEvaluacion $idEstudianteEvaluacion
 */
class RespuesEstudiante extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return RespuesEstudiante the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'respuesta_estudiante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_estudiante_evaluacion, id_respuesta', 'required'),
			array('id_estudiante_evaluacion, id_respuesta', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_respuesta_estudiante, id_estudiante_evaluacion, id_respuesta', 'safe', 'on'=>'search'),
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
			'idRespuesta' => array(self::BELONGS_TO, 'Respuesta', 'id_respuesta'),
			'idEstudianteEvaluacion' => array(self::BELONGS_TO, 'EstudianteEvaluacion', 'id_estudiante_evaluacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_respuesta_estudiante' => 'Id Respuesta Estudiante',
			'id_estudiante_evaluacion' => 'Id Estudiante Evaluacion',
			'id_respuesta' => 'Id Respuesta',
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

		$criteria->compare('id_respuesta_estudiante',$this->id_respuesta_estudiante);
		$criteria->compare('id_estudiante_evaluacion',$this->id_estudiante_evaluacion);
		$criteria->compare('id_respuesta',$this->id_respuesta);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}