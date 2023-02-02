<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\Casos;
use app\models\CasosSearch;
use yii\helpers\Json;


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
    public function actionIndex(){

        $cant_clientes = \app\models\Clientes::find()->count();
        $cant_casos = \app\models\Casos::find()->count();
        $cant_asesores = \app\models\Asesores::find()->count();
		
		//Datos de la gráfica
        $sql= Yii::$app->db->createCommand('select distinct( date_format(a.fecha_creacion, "%d-%m-%Y") ) as fecha,  count(a.id) as cant
        from Casos a
        group by fecha
        order by fecha asc limit 7')->queryAll();
        
        $categorias="";
        $series_cant="";
        foreach ( $sql as $id => $dato ){
            $categorias.= "'".date('d-m-Y', strtotime($dato["fecha"]))."',";
            $series_cant.= "'".$dato["cant"]."',";
        }

        return $this->render('index', [
        'cant_clientes' => $cant_clientes,
        'cant_casos' => $cant_casos,
        'cant_asesores' => $cant_asesores,
        'categorias' => @$categorias, 
        'series_cant' => @$series_cant, 
        'datos'=>$sql
        ]);
    }//fin index inicio
    
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
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
