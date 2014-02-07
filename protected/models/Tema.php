<?php

/**
 * This is the model class for table "tema".
 *
 * The followings are the available columns in table 'tema':
 * @property integer $id_tema
 * @property integer $id_curso
 * @property string $nombre_tema
 * @property string $descripcion_tema
 *
 * The followings are the available model relations:
 * @property Clase[] $clases
 * @property Curso $idCurso
 */
class Tema extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Tema the static model class
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
		return 'tema';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_curso, nombre_tema', 'required'),
			array('id_curso', 'numerical', 'integerOnly'=>true),
			array('nombre_tema', 'length', 'max'=>64),
			array('descripcion_tema', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_tema, id_curso, nombre_tema, descripcion_tema', 'safe', 'on'=>'search'),
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
			'clases' => array(self::HAS_MANY, 'Clase', 'id_tema'),
			'idCurso' => array(self::BELONGS_TO, 'Curso', 'id_curso'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tema' => 'Id Tema',
			'id_curso' => 'Id Curso',
			'nombre_tema' => 'Nombre Tema',
			'descripcion_tema' => 'Descripcion Tema',
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

		$criteria->compare('id_tema',$this->id_tema);
		$criteria->compare('id_curso',$this->id_curso);
		$criteria->compare('nombre_tema',$this->nombre_tema,true);
		$criteria->compare('descripcion_tema',$this->descripcion_tema,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}