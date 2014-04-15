<?php

/**
 * This is the model class for table "tipo_respuesta".
 *
 * The followings are the available columns in table 'tipo_respuesta':
 * @property integer $id_tipo_respuesta
 * @property string $nombre_tipo_respuesta
 *
 * The followings are the available model relations:
 * @property Respuesta[] $respuestas
 */
class TipoRespuesta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TipoRespuesta the static model class
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
		return 'tipo_respuesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_tipo_respuesta', 'required'),
			array('nombre_tipo_respuesta', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tipo_respuesta, nombre_tipo_respuesta', 'safe', 'on'=>'search'),
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
			'respuestas' => array(self::HAS_MANY, 'Respuesta', 'id_tipo_respuesta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipo_respuesta' => 'Id Tipo Respuesta',
			'nombre_tipo_respuesta' => 'Nombre Tipo Respuesta',
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

		$criteria->compare('id_tipo_respuesta',$this->id_tipo_respuesta);
		$criteria->compare('nombre_tipo_respuesta',$this->nombre_tipo_respuesta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}