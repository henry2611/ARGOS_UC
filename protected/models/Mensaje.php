<?php

/**
 * This is the model class for table "mensaje".
 *
 * The followings are the available columns in table 'mensaje':
 * @property string $id_mensaje
 * @property string $username_destino
 * @property string $username_origen
 * @property string $texto_mensaje
 *
 * The followings are the available model relations:
 * @property CrugeUser $usernameOrigen
 * @property CrugeUser $usernameDestino
 */
class Mensaje extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Mensaje the static model class
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
		return 'mensaje';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username_destino, username_origen, texto_mensaje', 'required'),
			array('username_destino, username_origen', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_mensaje, username_destino, username_origen, texto_mensaje', 'safe', 'on'=>'search'),
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
			'usernameOrigen' => array(self::BELONGS_TO, 'CrugeUser', 'username_origen'),
			'usernameDestino' => array(self::BELONGS_TO, 'CrugeUser', 'username_destino'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_mensaje' => 'Id Mensaje',
			'username_destino' => 'Username Destino',
			'username_origen' => 'Username Origen',
			'texto_mensaje' => 'Texto Mensaje',
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

		$criteria->compare('id_mensaje',$this->id_mensaje,true);
		$criteria->compare('username_destino',$this->username_destino,true);
		$criteria->compare('username_origen',$this->username_origen,true);
		$criteria->compare('texto_mensaje',$this->texto_mensaje,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}