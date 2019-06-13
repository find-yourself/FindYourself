<?php

namespace app\controllers;


use app\models\CourseType;
use yii\rest\ActiveController;

class CourseTypeController extends ActiveController
{
  public $modelClass = CourseType::class;
}