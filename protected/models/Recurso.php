<?php

/**
 * This is the model class for table "recurso".
 *
 * The followings are the available columns in table 'recurso':
 * @property integer $id_recurso
 * @property integer $id_clase
 * @property string $nombre_recurso
 * @property string $ubicacion_recurso
 * @property integer $duracion_recurso
 * @property integer $peso_recurso
 *
 * The followings are the available model relations:
 * @property Clase $idClase
 */
class Recurso extends CActiveRecord
{
        public $diapositiva;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Recurso the static model class
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
		return 'recurso';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_clase, nombre_recurso, ubicacion_recurso', 'required'),
			array('id_clase, duracion_recurso, peso_recurso', 'numerical', 'integerOnly'=>true),
			array('nombre_recurso', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_recurso, id_clase, nombre_recurso, ubicacion_recurso, duracion_recurso, peso_recurso', 'safe', 'on'=>'search'),
                        //Reglas de Validación para las diapositivas
                        //array('diapositiva', 'file', 'types'=>'application/vnd.ms-powerpoint'),
                        array('diapositiva', 'file', 'types'=>'ppt'),
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
			'idClase' => array(self::BELONGS_TO, 'Clase', 'id_clase'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_recurso' => 'Id Recurso',
			'id_clase' => 'Id Clase',
			'nombre_recurso' => 'Nombre Recurso',
			'ubicacion_recurso' => 'Ubicacion Recurso',
			'duracion_recurso' => 'Duracion Recurso',
			'peso_recurso' => 'Peso Recurso',
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

		$criteria->compare('id_recurso',$this->id_recurso);
		$criteria->compare('id_clase',$this->id_clase);
		$criteria->compare('nombre_recurso',$this->nombre_recurso,true);
		$criteria->compare('ubicacion_recurso',$this->ubicacion_recurso,true);
		$criteria->compare('duracion_recurso',$this->duracion_recurso);
		$criteria->compare('peso_recurso',$this->peso_recurso);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}