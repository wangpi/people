<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 */
class Goods extends ActiveRecord
{
    public static function tableName(){
        return 'db_goods';
    }
}