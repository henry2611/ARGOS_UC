<?php
class HolaController extends Controller
{
	public function actionIndex()
	{
		$model=CActiveRecord::model("Users")->findAll();
		$twitter = "@The_Jigsaw47";
		$this->render("index", array("model"=>$model,"twitter"=>$twitter));
	}
}