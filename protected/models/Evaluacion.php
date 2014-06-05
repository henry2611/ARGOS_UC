<?php

/**
 * This is the model class for table "evaluacion".
 *
 * The followings are the available columns in table 'evaluacion':
 * @property integer $id_evaluacion
 * @property integer $id_tipo_evaluacion
 * @property integer $id_clase
 * @property integer $porcentaje
 * @property integer $tiempo_inicio
 * @property integer $tiempo_final
 * @property integer $numero_max_tips
 * @property integer $cant_dificil
 * @property integer $cant_intermedio
 * @property integer $cant_facil
 * @property integer $puntuacion_dificil
 * @property integer $puntuacion_intermedio
 * @property integer $puntuacion_facil
 *
 * The followings are the available model relations:
 * @property EstudianteEvaluacion[] $estudianteEvaluacions
 * @property TipoEvaluacion $idTipoEvaluacion
 * @property Clase $idClase
 * @property Pregunta[] $preguntas
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
			array('id_clase', 'required'),
			array('id_clase, porcentaje, numero_max_tips, cant_dificil, cant_intermedio, cant_facil, puntuacion_dificil, puntuacion_intermedio, puntuacion_facil', 'numerical', 'integerOnly'=>true),
			array('tiempo_inicio, tiempo_final','type','type'=>'datetime','datetimeFormat'=>'yyyy-mm-dd hh:mm:ss'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_evaluacion, id_clase, porcentaje, tiempo_inicio, tiempo_final, numero_max_tips, cant_dificil, cant_intermedio, cant_facil, puntuacion_dificil, puntuacion_intermedio, puntuacion_facil', 'safe', 'on'=>'search'),
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
			'estudianteEvaluacions' => array(self::HAS_MANY, 'EstudianteEvaluacion', 'id_evaluacion'),
			'idClase' => array(self::BELONGS_TO, 'Clase', 'id_clase'),
			'preguntas' => array(self::HAS_MANY, 'Pregunta', 'id_evaluacion'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_evaluacion' => 'Id Evaluacion',
			'id_clase' => 'Id Clase',
			'porcentaje' => 'Porcentaje',
			'tiempo_inicio' => 'Tiempo Inicio',
			'tiempo_final' => 'Tiempo Final',
			'numero_max_tips' => 'Numero Max Tips',
			'cant_dificil' => 'Cant Dificil',
			'cant_intermedio' => 'Cant Intermedio',
			'cant_facil' => 'Cant Facil',
			'puntuacion_dificil' => 'Puntuacion Dificil',
			'puntuacion_intermedio' => 'Puntuacion Intermedio',
			'puntuacion_facil' => 'Puntuacion Facil',
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
		$criteria->compare('id_clase',$this->id_clase);
		$criteria->compare('porcentaje',$this->porcentaje);
		$criteria->compare('tiempo_inicio',$this->tiempo_inicio);
		$criteria->compare('tiempo_final',$this->tiempo_final);
		$criteria->compare('numero_max_tips',$this->numero_max_tips);
		$criteria->compare('cant_dificil',$this->cant_dificil);
		$criteria->compare('cant_intermedio',$this->cant_intermedio);
		$criteria->compare('cant_facil',$this->cant_facil);
		$criteria->compare('puntuacion_dificil',$this->puntuacion_dificil);
		$criteria->compare('puntuacion_intermedio',$this->puntuacion_intermedio);
		$criteria->compare('puntuacion_facil',$this->puntuacion_facil);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}