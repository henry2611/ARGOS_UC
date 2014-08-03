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
class RespuestaEstudiante extends CActiveRecord
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
			array('id_estudiante_evaluacion, id_pregunta, texto_respuesta', 'required'),
			array('texto_respuesta_b', 'safe'),
			array('id_estudiante_evaluacion, id_pregunta', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_respuesta_estudiante, id_estudiante_evaluacion, id_pregunta, texto_respuesta, texto_respuesta_b', 'safe', 'on'=>'search'),
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
			'idPregunta' => array(self::BELONGS_TO, 'Pregunta', 'id_pregunta'),
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
			'id_pregunta' => 'Id Pregunta',
			'texto_respuesta' => 'Texto Respuesta',
			'texto_respuesta_b' => 'Texto Respuesta',
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
		$criteria->compare('id_pregunta',$this->id_pregunta);
		$criteria->compare('texto_respuesta',$this->texto_respuesta,true);
		$criteria->compare('texto_respuesta_b',$this->texto_respuesta_b,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}