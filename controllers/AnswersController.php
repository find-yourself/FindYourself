<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 01.06.2019
 * Time: 13:02
 */

namespace app\controllers;

use app\models\Answers;
use yii\rest\ActiveController;

class AnswersController extends ActiveController
{
    public $modelClass = Answers::class;
}