<?php

/**
 * This is the model class for table "pregunta".
 *
 * The followings are the available columns in table 'pregunta':
 * @property integer $id_pregunta
 * @property integer $id_evaluacion
 * @property integer $id_tipo_pregunta
 * @property string $texto_pregunta
 *
 * The followings are the available model relations:
 * @property TipoPregunta $idTipoPregunta
 * @property Evaluacion $idEvaluacion
 * @property Respuesta[] $respuestas
 */
class Pregunta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pregunta the static model class
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
		return 'pregunta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_evaluacion, id_tipo_pregunta, texto_pregunta', 'required'),
			array('id_evaluacion, id_tipo_pregunta', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_pregunta, id_evaluacion, id_tipo_pregunta, texto_pregunta', 'safe', 'on'=>'search'),
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
			'idTipoPregunta' => array(self::BELONGS_TO, 'TipoPregunta', 'id_tipo_pregunta'),
			'idEvaluacion' => array(self::BELONGS_TO, 'Evaluacion', 'id_evaluacion'),
			'respuestas' => array(self::HAS_MANY, 'Respuesta', 'id_pregunta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_pregunta' => 'Id Pregunta',
			'id_evaluacion' => 'Id Evaluacion',
			'id_tipo_pregunta' => 'Id Tipo Pregunta',
			'texto_pregunta' => 'Texto Pregunta',
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

		$criteria->compare('id_pregunta',$this->id_pregunta);
		$criteria->compare('id_evaluacion',$this->id_evaluacion);
		$criteria->compare('id_tipo_pregunta',$this->id_tipo_pregunta);
		$criteria->compare('texto_pregunta',$this->texto_pregunta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}