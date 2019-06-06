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
    $tendency = [
        'human' => 10,
        'technique' => 3,
        'signSystem' => 5,
        'artImage' => 13,
        'nature' => 4,
        'performer' => 8,
        'creativity' => 12,
    ];

    $ability = [
        'human' => 10,
        'technique' => 3,
        'signSystem' => 5,
        'artImage' => 13,
        'nature' => 4,
        'performer' => 8,
        'creativity' => 12,
    ];

    $arrTendencySubject = array_slice($tendency, 0, 5);
    $arrTendencyNature = array_slice($tendency, 5);
    $arrAbilitySubject = array_slice($ability, 0, 5);
    $arrAbilityNature = array_slice($ability, 5);

    $tendencySubject = array_keys($arrTendencySubject, max($arrTendencySubject))[0];
    $tendencyNature = array_keys($arrTendencyNature, max($arrTendencyNature))[0];

    $abilitySubject = array_keys($arrAbilitySubject, max($arrAbilitySubject))[0];
    $abilityNature = array_keys($arrAbilityNature, max($arrAbilityNature))[0];


    }
}

