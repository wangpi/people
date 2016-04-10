<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;

/**
 * LoginForm is the model behind the login form.
 */
class Shai extends ActiveRecord
{
    public static function tableName(){
        return 'db_shaidan';
    }
}