<?php

/**
 * This is the model class for table "respuesta".
 *
 * The followings are the available columns in table 'respuesta':
 * @property integer $id_respuesta
 * @property integer $id_pregunta
 * @property integer $id_tipo_respuesta
 * @property string $texto_respuesta
 *
 * The followings are the available model relations:
 * @property TipoRespuesta $idTipoRespuesta
 * @property Pregunta $idPregunta
 * @property RespuestaEstudiante[] $respuestaEstudiantes
 */
class Respuesta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Respuesta the static model class
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
		return 'respuesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_pregunta, id_tipo_respuesta, texto_respuesta', 'required'),
			array('texto_respuesta_b', 'safe'),
			array('id_pregunta, id_tipo_respuesta', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_respuesta, id_pregunta, id_tipo_respuesta, texto_respuesta, texto_respuesta_b', 'safe', 'on'=>'search'),
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
			'idTipoRespuesta' => array(self::BELONGS_TO, 'TipoRespuesta', 'id_tipo_respuesta'),
			'idPregunta' => array(self::BELONGS_TO, 'Pregunta', 'id_pregunta'),
			'respuestaEstudiantes' => array(self::HAS_MANY, 'RespuestaEstudiante', 'id_respuesta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_respuesta' => 'Id Respuesta',
			'id_pregunta' => 'Id Pregunta',
			'id_tipo_respuesta' => 'Id Tipo Respuesta',
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

		$criteria->compare('id_respuesta',$this->id_respuesta);
		$criteria->compare('id_pregunta',$this->id_pregunta);
		$criteria->compare('id_tipo_respuesta',$this->id_tipo_respuesta);
		$criteria->compare('texto_respuesta',$this->texto_respuesta,true);
		$criteria->compare('texto_respuesta_b',$this->texto_respuesta_b,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}