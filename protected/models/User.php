<?php

/**
 * This is the model class for table "cruge_user".
 *
 * The followings are the available columns in table 'cruge_user':
 * @property integer $iduser
 * @property string $regdate
 * @property string $actdate
 * @property string $logondate
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $authkey
 * @property integer $state
 * @property integer $totalsessioncounter
 * @property integer $currentsessioncounter
 * @property string $nombreUsuario
 * @property string $fechaNacimiento
 * @property string $dependencia
 * @property string $foto
 * @property string $fechaUltConex
 * @property string $bioUsuario
 * @property string $ipUltConex
 * @property integer $numTips
 *
 * The followings are the available model relations:
 * @property CrugeAuthitem[] $crugeAuthitems
 * @property CrugeFieldvalue[] $crugeFieldvalues
 * @property Curso[] $cursos
 * @property CursoEstudiantes[] $cursoEstudiantes
 * @property Mensaje[] $mensajes
 * @property Mensaje[] $mensajes1
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'cruge_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('state, totalsessioncounter, currentsessioncounter, numTips', 'numerical', 'integerOnly'=>true),
			array('regdate, actdate, logondate', 'length', 'max'=>30),
			array('username, password', 'length', 'max'=>64),
			array('email', 'length', 'max'=>45),
			array('authkey', 'length', 'max'=>100),
			array('nombreUsuario', 'length', 'max'=>200),
			array('foto', 'length', 'max'=>300),
			array('ipUltConex', 'length', 'max'=>15),
			array('fechaNacimiento, dependencia, fechaUltConex, bioUsuario', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iduser, regdate, actdate, logondate, username, email, password, authkey, state, totalsessioncounter, currentsessioncounter, nombreUsuario, fechaNacimiento, dependencia, foto, fechaUltConex, bioUsuario, ipUltConex, numTips', 'safe', 'on'=>'search'),
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
			'crugeAuthitems' => array(self::MANY_MANY, 'CrugeAuthitem', 'cruge_authassignment(userid, itemname)'),
			'crugeFieldvalues' => array(self::HAS_MANY, 'CrugeFieldvalue', 'iduser'),
			'cursos' => array(self::HAS_MANY, 'Curso', 'username_docente'),
			'cursoEstudiantes' => array(self::HAS_MANY, 'CursoEstudiantes', 'username_estudiante'),
			'mensajes' => array(self::HAS_MANY, 'Mensaje', 'username_origen'),
			'mensajes1' => array(self::HAS_MANY, 'Mensaje', 'username_destino'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iduser' => 'Iduser',
			'regdate' => 'Regdate',
			'actdate' => 'Actdate',
			'logondate' => 'Logondate',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'authkey' => 'Authkey',
			'state' => 'State',
			'totalsessioncounter' => 'Totalsessioncounter',
			'currentsessioncounter' => 'Currentsessioncounter',
			'nombreUsuario' => 'Nombre Usuario',
			'fechaNacimiento' => 'Fecha Nacimiento',
			'dependencia' => 'Dependencia',
			'foto' => 'Foto',
			'fechaUltConex' => 'Fecha Ult Conex',
			'bioUsuario' => 'Bio Usuario',
			'ipUltConex' => 'Ip Ult Conex',
			'numTips' => 'Num Tips',
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

		$criteria->compare('iduser',$this->iduser);
		$criteria->compare('regdate',$this->regdate,true);
		$criteria->compare('actdate',$this->actdate,true);
		$criteria->compare('logondate',$this->logondate,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('authkey',$this->authkey,true);
		$criteria->compare('state',$this->state);
		$criteria->compare('totalsessioncounter',$this->totalsessioncounter);
		$criteria->compare('currentsessioncounter',$this->currentsessioncounter);
		$criteria->compare('nombreUsuario',$this->nombreUsuario,true);
		$criteria->compare('fechaNacimiento',$this->fechaNacimiento,true);
		$criteria->compare('dependencia',$this->dependencia,true);
		$criteria->compare('foto',$this->foto,true);
		$criteria->compare('fechaUltConex',$this->fechaUltConex,true);
		$criteria->compare('bioUsuario',$this->bioUsuario,true);
		$criteria->compare('ipUltConex',$this->ipUltConex,true);
		$criteria->compare('numTips',$this->numTips);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}