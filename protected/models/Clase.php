<?php

/**
 * This is the model class for table "clase".
 *
 * The followings are the available columns in table 'clase':
 * @property integer $id_clase
 * @property integer $id_tema
 * @property string $nombre_clase
 * @property string $descripcion_clase
 *
 * The followings are the available model relations:
 * @property Tema $idTema
 * @property Evaluacion[] $evaluacions
 * @property Recurso[] $recursos
 */
class Clase extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Clase the static model class
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
		return 'clase';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tema, nombre_clase', 'required'),
			array('id_tema', 'numerical', 'integerOnly'=>true),
			array('nombre_clase', 'length', 'max'=>64),
			array('descripcion_clase', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_clase, id_tema, nombre_clase, descripcion_clase', 'safe', 'on'=>'search'),
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
			'idTema' => array(self::BELONGS_TO, 'Tema', 'id_tema'),
			'evaluacions' => array(self::HAS_MANY, 'Evaluacion', 'id_clase'),
			'recursos' => array(self::HAS_MANY, 'Recurso', 'id_clase'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_clase' => 'Id Clase',
			'id_tema' => 'Id Tema',
			'nombre_clase' => 'Nombre Clase',
			'descripcion_clase' => 'Descripcion Clase',
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

		$criteria->compare('id_clase',$this->id_clase);
		$criteria->compare('id_tema',$this->id_tema);
		$criteria->compare('nombre_clase',$this->nombre_clase,true);
		$criteria->compare('descripcion_clase',$this->descripcion_clase,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}