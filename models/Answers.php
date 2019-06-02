<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 02.06.2019
 * Time: 15:02
 */

namespace app\models;

use yii\db\ActiveRecord;


class Answers extends ActiveRecord
{
    public static function tableName()
    {
        return 'answers';
    }

    public function getAnswers()
    {
        return Answers::find()->all();
    }
}