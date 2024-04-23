<?php

namespace app\controllers;

use Parser;
use Yii;
use yii\filters\AccessControl;
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
                'class' => AccessControl::class,
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
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
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
        $this->view->title = "Test";

        $fileName = $_FILES['file']['tmp_name'];
        if (!empty($fileName)) {
            $parser = new Parser($fileName);
            $chart_bdr = $parser->getDataBdr();
//    var_dump($chart_bdr);

            $chart_ip = $parser->getDataIp();
//    var_dump($chart_ip);

            $table_bdr = $parser->getInfo();
            $_SESSION['bdr'] = $table_bdr;
            $_SESSION['ip'] = $table_bdr;
        }

        $data_bdr = [
            'labels' => ['ТП', 'КЗ', 'Прейскурант', 'ГПК', 'ТП_в', 'КЗ_в', 'Прейскурант_в', 'ГПК_в'],
            'datasets' => [
                [
                    'label' => "Количество",
                    'backgroundColor' => [
                        "rgba(37, 50, 130)",
                        "rgba(58, 74, 119)",
                        "rgba(80, 98, 154)",
                        "rgba(112, 132, 187)",
                        "rgba(37, 50, 130, 0.6)",
                        "rgba(58, 74, 119, 0.6)",
                        "rgba(80, 98, 154, 0.6)",
                        "rgba(112, 132, 187, 0.6)",
                    ],
                    'borderColor' => "rgba(179,181,198,1)",
                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
//                        'data' => [65, 59, 90, 81, 56, 55, 40]
//                    'data' => $chart_bdr
                    'data' => [200,50,60,40,100,10,20,15]
                ]
//                [
//                    'label' => "My Second dataset",
//                    'backgroundColor' => "rgba(255,99,132,0.2)",
//                    'borderColor' => "rgba(255,99,132,1)",
//                    'pointBackgroundColor' => "rgba(255,99,132,1)",
//                    'pointBorderColor' => "#fff",
//                    'pointHoverBackgroundColor' => "#fff",
//                    'pointHoverBorderColor' => "rgba(255,99,132,1)",
//                    'data' => [28, 48, 40, 19, 96, 27, 100]
//                ]
            ]
        ];

        $data_ip = [
            'labels' => ['ТП', 'КЗ', 'Прейскурант', 'ГПК', 'ТП_в', 'КЗ_в', 'Прейскурант_в', 'ГПК_в'],
            'datasets' => [
                [
                    'label' => "Количество",
                    'backgroundColor' => [
                        "rgba(37, 50, 130)",
                        "rgba(58, 74, 119)",
                        "rgba(80, 98, 154)",
                        "rgba(112, 132, 187)",
                        "rgba(37, 50, 130, 0.6)",
                        "rgba(58, 74, 119, 0.6)",
                        "rgba(80, 98, 154, 0.6)",
                        "rgba(112, 132, 187, 0.6)",
                    ],
                    'borderColor' => "rgba(179,181,198,1)",
                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                    'pointBorderColor' => "#fff",
                    'pointHoverBackgroundColor' => "#fff",
                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
//                        'data' => [65, 59, 90, 81, 56, 55, 40]
//                    'data' => $chart_ip
                    'data' => [180,30,80,40,120,30,10,25]
                ]
//                [
//                    'label' => "My Second dataset",
//                    'backgroundColor' => "rgba(255,99,132,0.2)",
//                    'borderColor' => "rgba(255,99,132,1)",
//                    'pointBackgroundColor' => "rgba(255,99,132,1)",
//                    'pointBorderColor' => "#fff",
//                    'pointHoverBackgroundColor' => "#fff",
//                    'pointHoverBorderColor' => "rgba(255,99,132,1)",
//                    'data' => [28, 48, 40, 19, 96, 27, 100]
//                ]
            ]
        ];

        return $this->render('index',['data_bdr' => $data_bdr, 'data_ip' => $data_ip]);
//        return $this->render('test',['data_bdr' => $data_bdr]);
    }

    public function actionTable_bdr()
    {
        $this->view->title = "Table_bdr";

        $fileName = $_FILES['file']['tmp_name'];
        if (!empty($fileName)) {
            $parser = new Parser($fileName);
            $table_bdr = $parser->getInfo();
            $_SESSION['bdr'] = $table_bdr;
        }

        return $this->render('table_bdr',['table_bdr' => $table_bdr]);
    }

    public function actionTable_ip()
    {
        $this->view->title = "Table_ip";

        $fileName = $_FILES['file']['tmp_name'];
        if (!empty($fileName)) {
            $parser = new Parser($fileName);
            $table_bdr = $parser->getInfo();
            $_SESSION['ip'] = $table_bdr;
        }

        return $this->render('table_ip',['table_bdr' => $table_bdr]);
    }

//    /**
//     * Login action.
//     *
//     * @return Response|string
//     */
//    public function actionLogin()
//    {
//        if (!Yii::$app->user->isGuest) {
//            return $this->goHome();
//        }
//
//        $model = new LoginForm();
//        if ($model->load(Yii::$app->request->post()) && $model->login()) {
//            return $this->goBack();
//        }
//
//        $model->password = '';
//        return $this->render('login', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Logout action.
//     *
//     * @return Response
//     */
//    public function actionLogout()
//    {
//        Yii::$app->user->logout();
//
//        return $this->goHome();
//    }
//
//    /**
//     * Displays contact page.
//     *
//     * @return Response|string
//     */
//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//
//            return $this->refresh();
//        }
//        return $this->render('contact', [
//            'model' => $model,
//        ]);
//    }
//
//    /**
//     * Displays about page.
//     *
//     * @return string
//     */
//    public function actionAbout()
//    {
//        return $this->render('about');
//    }
}

