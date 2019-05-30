<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 25/05/2019
 * Time: 11:06
 */

namespace app\controllers;


use yii\rest\ActiveController;
use app\models\TestType;
use yii\web\Response;

class TestTypeController extends ActiveController
{
  public $modelClass = TestType::class;
}