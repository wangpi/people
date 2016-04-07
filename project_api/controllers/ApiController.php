<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ApiController extends Controller
{
	
	/**
	 * [actionUser 注册接口]
	 */
	public function actionUser(){
		$connect = Yii::$app->db;
		$phone = isset($_GET['u_phone'])?$_GET['u_phone']:'';
		$pwd = isset($_GET['u_pwd'])?$_GET['u_pwd']:'';
		if(empty($phone)  or empty($pwd)){
			$result = array(
				'status' => 1,
				'message' => '信息不完整'
			);
		}else{
			$sql = "select * from user where( u_phone = '$phone')";
			$arr = $connect->createCommand($sql)->queryOne();
			if($arr){
				$result = array(
					'status' => 2,
					'message' => '用户已存在'
				);
			}else{
				$sel = "insert into user(u_phone,u_pwd) values('$phone','$pwd')";
				echo $sel;die;
				$re = $connect->createCommand($sel)->execute();
				if($re){

					$uid = $connect->getLastInsertID();
					$result = array(

						'status' => 3,
						'message' => '注册成功',
						

					);
				}else{
					$result = array(
						'status' => 4,
						'message' => '注册失败'
					);
				}
			}
		}
		echo json_encode($result);	
	}

	/**
	 * [actionLogin 登陆接口]
	 */
	public function actionLogin(){

	}
http://123.56.249.121/project_api/web/index.php?r=api/user&u_phone=%22324324242%22&u_pwd=%221%22
	
}