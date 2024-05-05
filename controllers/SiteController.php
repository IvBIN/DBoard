<?php

namespace app\controllers;

use app\models\Form;
use app\models\Parser;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

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
                'only' => ['logout', 'index'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['?'],
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

        $model = new Form();
        if ($model->load(Yii::$app->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if ($model->validate()) {
                $fileName = $model->file->tempName;

                $parser = new Parser($fileName);
                $chart_bdr = $parser->getDataBdr();

                $chart_ip = $parser->getDataIp();
                $count_contract = $parser->getCountContracts();

                $table_bdr = $parser->getInfo();
//                var_dump($table_bdr);
//                $_SESSION['tableInfo'] = $table_bdr;
                Yii::$app->session->set('tableInfo', $table_bdr);
            }
        }
        else {
//            Yii::$app->session->set('tableInfo', '');
            unset($_SESSION['tableInfo']);

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
                    'data' => $chart_bdr
//                    'data' => [200,50,60,40,100,10,20,15]
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
                    'data' => $chart_ip
//                    'data' => [180,30,80,40,120,30,10,25]
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

        return $this->render('index',['data_bdr' => $data_bdr, 'data_ip' => $data_ip, 'count_contract' =>$count_contract,'model' => $model]);
//        return $this->render('test',['data_bdr' => $data_bdr]);
    }

    public function actionTableBdr()
    {
        $this->view->title = "Table_bdr";
        $this->layout = 'iframe';

        return $this->render('table_bdr',['table_bdr' => $_SESSION['tableInfo']]);

    }

    public function actionTableIp()
    {
        $this->view->title = "Table_ip";
        $this->layout = 'iframe';

        return $this->render('table_ip',['table_bdr' => $_SESSION['tableInfo']]);
    }

    public function actionHelp()
    {
        $this->view->title = "Help";
        $this->layout = 'iframe';

        return $this->render('help');
    }

    public function actionDownload()
    {
        $file = './files/test02.xls';
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        readfile($file);
        return $this->goHome();

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

