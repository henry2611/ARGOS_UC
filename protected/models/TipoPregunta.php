<?php

/**
 * This is the model class for table "tipo_pregunta".
 *
 * The followings are the available columns in table 'tipo_pregunta':
 * @property integer $id_tipo_pregunta
 * @property string $nombre_tipo_pregunta
 *
 * The followings are the available model relations:
 * @property Pregunta[] $preguntas
 */
class TipoPregunta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TipoPregunta the static model class
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
		return 'tipo_pregunta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre_tipo_pregunta', 'required'),
			array('nombre_tipo_pregunta', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tipo_pregunta, nombre_tipo_pregunta', 'safe', 'on'=>'search'),
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
			'preguntas' => array(self::HAS_MANY, 'Pregunta', 'id_tipo_pregunta'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tipo_pregunta' => 'Id Tipo Pregunta',
			'nombre_tipo_pregunta' => 'Nombre Tipo Pregunta',
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

		$criteria->compare('id_tipo_pregunta',$this->id_tipo_pregunta);
		$criteria->compare('nombre_tipo_pregunta',$this->nombre_tipo_pregunta,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}