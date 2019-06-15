<?php

namespace app\controllers;

use app\models\Answers;

use app\models\Professions;
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



    // return $this->render('quiz-item', [
    //   'data' => $data,
    //   'newData' => $newData,
    // ]);
      
//      'model' => $model,
//      'questions' => $questions,

    // if($id == 1) {
    //     return $this->render('solomin-quiz', [
    //         'data' => $data_questions,
    //     ]);
    // }


    if($id == 1) {
        return $this->render('solomin-quiz', [
            'data_questions' => $data_questions,
            'data_answers' => $data_answers,
            'newData' => $newData,
          ]);
    } else {
        return $this->render('quiz-item', [
            'data_questions' => $data_questions,
            'data_answers' => $data_answers,
            'newData' => $newData,
        ]);
    }

  }

  public function actionResult()
  {
    $result = [];

    foreach (Yii::$app->request->post() as $answer => $value) {
      $result[$answer] = $value;
    }
    $resultTest = $this->getResultYovashi($result);

    return $this->render('result', [
      'resultTest' => $resultTest
    ]);

  }

  protected function getResultYovashi($result)
  {

    $workInPeople = [//сфера работы с людьми
      72 => [1, 2],
      74 => [1, 2],
      76 => [3, 4],
      79 => [1, 2],
      82 => [3, 4],
      86 => [1, 2],
      87 => [3, 4],
      19 => [3, 4],
      93 => [3, 4],
      98 => [3, 4]
    ];

    $mentalWork = [//сфера умственного труда
      74 => [3, 4],
      77 => [1, 2],
      80 => [3, 4],
      83 => [1, 2],
      84 => [3, 4],
      88 => [1, 2],
      90 => [1, 2],
      91 => [3, 4],
      96 => [3, 4],
      100 => [1, 2]
    ];

    $technicalInterests = [//сфера технических интересов
      71 => [2, 3],
      73 => [2, 3],
      76 => [1, 2],
      78 => [3, 4],
      82 => [1, 2],
      84 => [1, 2],
      85 => [3, 4],
      95 => [1, 2],
      96 => [1, 2],
      99 => [3, 4]
    ];

    $aestheticsArt = [//сфера эстетики и искусства
      71 => [1, 2],
      75 => [3, 4],
      78 => [1, 2],
      80 => [1, 2],
      81 => [3, 4],
      87 => [1, 2],
      91 => [1, 2],
      93 => [1, 2],
      94 => [3, 4],
      98 => [1, 2]
    ];

    $physicalAndActivities = [//сфера физического труда,  подвижной деятельности
      72 => [3, 4],
      75 => [1, 2],
      83 => [3, 4],
      85 => [1, 2],
      88 => [3, 4],
      90 => [3, 4],
      92 => [1, 2],
      94 => [1, 2],
      95 => [3, 4],
      97 => [1, 2]
    ];

    $materialInterestsAndEconomicActivities = [//сфера материальных интересов,  планово-экономических видов работ
      73 => [1, 2],
      77 => [3, 4],
      79 => [3, 4],
      81 => [1, 2],
      86 => [3, 4],
      89 => [1, 2],
      92 => [3, 4],
      97 => [3, 4],
      99 => [1, 2],
      100 => [3, 4]

    ];

    $workInPeopleResult = [];
    $mentalWorkResult = [];
    $technicalInterestsResult = [];
    $aestheticsArtResult = [];
    $physicalAndActivitiesResult = [];
    $materialInterestsAndEconomicActivitiesResult = [];



    foreach ($result as $answer => $value) {

          if (isset($workInPeople[$answer])) {
            foreach ($workInPeople[$answer] as $item) {
              if ($item == $value) {
                $workInPeopleResult[$answer] = $value;
              }
            }
          }
          if (isset($mentalWork[$answer])) {
            foreach ($mentalWork[$answer] as $item) {
              if ($item == $value) {
                $mentalWorkResult[$answer] = $value;
              }
            }
          }
          if (isset($technicalInterests[$answer])) {
            foreach ($technicalInterests[$answer] as $item) {
              if ($item == $value) {
                $technicalInterestsResult[$answer] = $value;
              }
            }
          }
          if (isset($aestheticsArt[$answer])) {
            foreach ($aestheticsArt[$answer] as $item) {
              if ($item == $value) {
                $aestheticsArtResult[$answer] = $value;
              }
            }
          }
          if (isset($physicalAndActivities[$answer])) {
            foreach ($physicalAndActivities[$answer] as $item) {
              if ($item == $value) {
                $physicalAndActivitiesResult[$answer] = $value;
              }
            }
          }
          if (isset($materialInterestsAndEconomicActivities[$answer])) {
            foreach ($materialInterestsAndEconomicActivities[$answer] as $item) {
              if ($item == $value) {
                $materialInterestsAndEconomicActivitiesResult[$answer] = $value;
              }
            }

          }
    }

 $itog = [
   'сфера работы с людьми' => count($workInPeopleResult),
   'сфера умственного труда' => count($mentalWorkResult),
   'сфера технических интересов' => count($technicalInterestsResult),
   'сфера эстетики и искусства' => count($aestheticsArtResult),
   'сфера физического труда,  подвижной деятельности' => count($physicalAndActivitiesResult),
   'сфера материальных интересов,  планово-экономических видов работ' => count($materialInterestsAndEconomicActivitiesResult)
 ];

    return array_keys($itog, max($itog));
    }

  public function actionCourseType()
  {
    $json_url = Yii::$app->params['server_url'] . "/course-types";
    $json = file_get_contents($json_url);
    $data = json_decode($json, TRUE);

    return $this->render('course-type', [
      'data' => $data,
    ]);
  }

  public function actionCourse($id)
  {
    $json_url = Yii::$app->params['server_url'] . "/course-types/" . $id . "?expand=course";
    $json = file_get_contents($json_url);
    $data = json_decode($json, TRUE);

    return $this->render('course', [
      'data' => $data,
    ]);
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

    public function actionProfessions()
    {
        $json_url_professions = Yii::$app->params['server_url'] . "/professions";
        $json = file_get_contents($json_url_professions);
        $data_professions = json_decode($json, TRUE);

//        $professions = Professions::find() -> all();

        return $this->render('professions', [
            'data_professions' => $data_professions,
        ]);
    }

}

