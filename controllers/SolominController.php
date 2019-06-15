<?php

namespace app\controllers;

use app\models\Answers;

use app\models\Professions;
use app\models\SolominWorks;
use Yii;
use yii\data\ActiveDataProvider;
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
      \Yii::$app->response->format = Response::FORMAT_JSON;
        $request = Yii::$app->request;
        $results = $request->post();


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

        $tendencySubject = strtolower(preg_replace('/^tendency/', '', $tendencySubject));
        $tendencyNature = strtolower(preg_replace('/^tendency/', '', $tendencyNature));

        $abilitySubject = strtolower(preg_replace('/^ability/', '', $abilitySubject));
        $abilityNature = strtolower(preg_replace('/^ability/', '', $abilityNature));

        $tendencyWorksQuery = Professions::find()
            ->leftJoin('solomin_works', 'professions.id = solomin_works.profession_id')
            ->where(['labor_object' => $tendencySubject])
            ->andWhere(['work_nature' => $tendencyNature]);
        $tendencyWorks = new ActiveDataProvider([
           'query' => $tendencyWorksQuery,
        ]);

        $tendencyWorks = $tendencyWorks->getModels();

      $abilityWorksQuery = Professions::find()
          ->leftJoin('solomin_works', 'professions.id = solomin_works.profession_id')
          ->where(['labor_object' => $abilitySubject])
          ->andWhere(['work_nature' => $abilityNature]);
      $abilityWorks = new ActiveDataProvider([
          'query' => $abilityWorksQuery,
      ]);

      $abilityWorks = $abilityWorks->getModels();

      return [
          'tendencyWorks' => $tendencyWorks,
          'abilityWorks' => $abilityWorks,
      ];
  }
}

