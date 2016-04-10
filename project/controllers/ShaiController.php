<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Shai;
use app\models\Shai2;
use app\models\Goods;

class ShaiController extends Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex(){
        //查询所有的晒单
        $model=new Shai();
        $arr=$model->find()->asArray()->all();
        foreach($arr as $k=>$v){
            $g_id=$v['g_id'];
            $sd_id=$v['sd_id'];
            //根据商品id查询商品名称
            $goods=new Goods();
            $re=$goods->find()->where(['g_id'=>$g_id])->asArray()->all();
            $arr[$k]['dd']=$re;
            //查询晒单图片
            $shai=new Shai2();
            $c=$shai->find()->where(['sd_id'=>$sd_id])->asArray()->all();
            $arr[$k]['cc']=$c;
        }
        //print_r($arr);
        return $this->render('index',['arr'=>$arr]);
    }
    public function actionMore(){
        $id=$_POST['id'];
        $model=new Shai();
        $re=$model->find()->where(['sd_id'=>$id])->asArray()->one();
        $content=$re['sd_content'];
        return json_encode($content);
    }
}