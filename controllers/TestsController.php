<?php
/**
 * Created by PhpStorm.
 * User: sergey
 * Date: 25/05/2019
 * Time: 11:15
 */

namespace app\controllers;


use yii\rest\ActiveController;
use app\models\Tests;

class TestsController extends ActiveController
{
  public $modelClass = Tests::class;
}