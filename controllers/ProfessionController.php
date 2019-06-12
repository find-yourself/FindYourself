<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.06.2019
 * Time: 12:39
 */

namespace app\controllers;


use app\models\Professions;
use yii\rest\ActiveController;

class ProfessionController extends ActiveController
{
    public $modelClass = Professions::class;
}