<?php

namespace app\controllers;

use app\models\Answers;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class AnswerController extends ActiveController
{
    public $modelClass = Answers::class;    
    
  public function actions(){
    $actions = parent::actions();
    unset($actions['index']);
    return $actions;
  }

  public function actionIndex(){
    $activeData = new ActiveDataProvider([
      'query' => Answers::find(),
      'pagination' => [
        'defaultPageSize' => false,
        'pageSizeLimit' => false,
      ],
    ]);
    return $activeData;
  }
    
}
