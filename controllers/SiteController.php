<?php

namespace app\controllers;

use app\models\Answers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\Cors;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
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

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }


    public function actionAboutQuiz()
    {
      $json_url = Yii::$app->params['server_url'] . "/quiz-types";

      $json = file_get_contents($json_url);
      $data = json_decode($json, TRUE);

        return $this->render('about-quiz', [
          'data' => $data,
        ]);
    }

  public function actionQuiz($id)
  {

    $json_url = Yii::$app->params['server_url'] . "/quiz-types/".$id."?expand=quiz";
    $json = file_get_contents($json_url);
    $data = json_decode($json, TRUE);


    return $this->render('quiz', [
      'data' => $data,
    ]);
  }

  public function actionQuizItem($id)
  {

    $json_url_question = Yii::$app->params['server_url'] . "/quiz-items/".$id."?expand=questions";
    $json = file_get_contents($json_url_question);
    $data_questions = json_decode($json, TRUE);

    $json_url_answer = Yii::$app->params['server_url'] . "/answers";
    $json = file_get_contents($json_url_answer);
    $data_answers = json_decode($json, TRUE);


    $newData = array_chunk($data_questions['questions'], 5, TRUE);


    if($id == 1) {
        return $this->render('solomin-quiz', [
            'data_questions' => $data_questions,
            'data_answers' => $data_answers,
            'newData' => $newData,
          ]);
    } else {
        return $this->render('quiz-item', [
            'data' => $data_questions,
        ]);
    }

  }

  public function actionResult()
  {
    var_dump(Yii::$app->request->post());
    die;

  }


    /**
     * Displays Start page.
     *
     * @return string
     */
    public function actionStart()
    {
        return $this->render('start');
    }

        /**
     * Displays Start page.
     *
     * @return string
     */
     public function actionBanner()
     {
         return $this->render('banner');
     }

     public function actionAnswer()
     {   
        $tendencyHuman = Yii::$app->request->post('tendencyHuman');
       
     }

}

