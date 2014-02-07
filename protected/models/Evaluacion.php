<?php

/**
 * This is the model class for table "evaluacion".
 *
 * The followings are the available columns in table 'evaluacion':
 * @property integer $id_evaluacion
 * @property integer $id_tipo_evaluacion
 * @property integer $id_clase
 * @property integer $calificacion
 * @property string $username_estudiante
 * @property integer $porcentaje
 * @property integer $numero_items
 * @property integer $duracion
 * @property integer $numero_max_tips
 *
 * The followings are the available model relations:
 * @property Clase $idClase
 * @property TipoEvaluacion $idTipoEvaluacion
 * @property Item[] $items
 */
class Evaluacion extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Evaluacion the static model class
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
		return 'evaluacion';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_tipo_evaluacion, id_clase', 'required'),
			array('id_tipo_evaluacion, id_clase, calificacion, porcentaje, numero_items, duracion, numero_max_tips', 'numerical', 'integerOnly'=>true),
			array('username_estudiante', 'length', 'max'=>64),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_evaluacion, id_tipo_evaluacion, id_clase, calificacion, username_estudiante, porcentaje, numero_items, duracion, numero_max_tips', 'safe', 'on'=>'search'),
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
			'idTipoEvaluacion' => array(self::BELONGS_TO, 'TipoEvaluacion', 'id_tipo_evaluacion'),
			'items' => array(self::HAS_MANY, 'Item', 'id_evaluacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_evaluacion' => 'Id Evaluacion',
			'id_tipo_evaluacion' => 'Id Tipo Evaluacion',
			'id_clase' => 'Id Clase',
			'calificacion' => 'Calificacion',
			'username_estudiante' => 'Username Estudiante',
			'porcentaje' => 'Porcentaje',
			'numero_items' => 'Numero Items',
			'duracion' => 'Duracion',
			'numero_max_tips' => 'Numero Max Tips',
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

		$criteria->compare('id_evaluacion',$this->id_evaluacion);
		$criteria->compare('id_tipo_evaluacion',$this->id_tipo_evaluacion);
		$criteria->compare('id_clase',$this->id_clase);
		$criteria->compare('calificacion',$this->calificacion);
		$criteria->compare('username_estudiante',$this->username_estudiante,true);
		$criteria->compare('porcentaje',$this->porcentaje);
		$criteria->compare('numero_items',$this->numero_items);
		$criteria->compare('duracion',$this->duracion);
		$criteria->compare('numero_max_tips',$this->numero_max_tips);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}