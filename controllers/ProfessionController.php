<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 12.06.2019
 * Time: 12:39
 */

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Professions;

class ProfessionController extends ActiveController
{
    public $modelClass = Professions::class;
}