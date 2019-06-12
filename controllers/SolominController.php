<?php

namespace app\controllers;

use app\models\Answers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\Cors;
use yii\rest\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SolominController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
            'corsFilter' => [
                'class' => Cors::className(),
                'cors' => [
                    'Access-Control-Request-Method' => ['GET', 'POST'],
                    'Access-Control-Request-Headers' => ['*'],
                    'Access-Control-Allow-Credentials' => ['*'],
                    'Access-Control-Max-Age' => 3600,
                    'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
                    'Access-Control-Allow-Origin' => ['*'],
                ]
            ],
        ];
    }

  public function actionIndex()
  {
//        $request = Yii::$app->request;
//        $results = $request->post();

      $results = [
      'tendencyHuman' => 12,
      'tendencyTechnique' => 8,
      'tendencySign' => 10,
      'tendencyArt' => 7,
      'tendencyNature' => 15,
      'tendencyPerformer' => 6,
      'tendencyCreativity' => 9,
      'abilityHuman' => 14,
      'abilityTechnique' => 6,
      'abilitySign' => 9,
      'abilityArt' => 8,
      'abilityNature' => 10,
      'abilityPerformer' => 7,
      'abilityCreativity' => 15,
      ];

        $tendency = array_slice($results, 0, 7);
        $ability = array_slice($results, 7);

        $arrTendencySubject = array_slice($tendency, 0, 5);
        $arrTendencyNature = array_slice($tendency, 5);
        $arrAbilitySubject = array_slice($ability, 0, 5);
        $arrAbilityNature = array_slice($ability, 5);

        $tendencySubject = array_keys($arrTendencySubject, max($arrTendencySubject))[0];
        $tendencyNature = array_keys($arrTendencyNature, max($arrTendencyNature))[0];

        $abilitySubject = array_keys($arrAbilitySubject, max($arrAbilitySubject))[0];
        $abilityNature = array_keys($arrAbilityNature, max($arrAbilityNature))[0];

        return $tendencySubject;


  }
}

