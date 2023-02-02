<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use yii\rest\ActiveController;
use app\models\Clientes;
use app\models\ClientesSearch;
use app\models\Asesores;


class ApiController extends Controller
{
	
	    public $enableCsrfValidation = false;


public static function allowedDomains()
{
    return [
        // '*',                        // star allows all domains
        'http://localhost:4200',
        
    ];
}

    /**
     * {@inheritdoc}
     */
  /*  public function behaviors()
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
    * */
public function behaviors()
{
    return array_merge(parent::behaviors(), [

        // For cross-domain AJAX request
        'corsFilter'  => [
            'class' => \yii\filters\Cors::className(),
            'cors'  => [
                // restrict access to domains:
                'Origin'                           => static::allowedDomains(),
                'Access-Control-Request-Method'    => ['POST'],
                'Access-Control-Allow-Credentials' => true,
                'Access-Control-Max-Age'           => 3600,                 // Cache (seconds)
            ],
        ],

    ]);
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

    public function actionClientes(){

        $clientes = Yii::$app->db->createCommand('SELECT *
            FROM Clientes a LEFT JOIN (
                SELECT cliente_id, COUNT(*) AS cant_casos
                FROM Casos
                GROUP BY cliente_id
            ) b ON b.cliente_id = a.id
            ORDER BY a.id DESC')->queryAll();
        //$clientes = Clientes::find()->asArray()->all();

        return $this->asJson($clientes);
    }


    public function actionCasos(){

        $clientes = Yii::$app->db->createCommand('SELECT a.*,date_format(a.fecha_creacion, "%d-%m-%Y") as fecha_caso,
            b.cedula as cedula_cliente, b.nombre as nombre_cliente,c.nombre as nombre_asesor
            FROM Casos a
            LEFT JOIN Clientes b ON b.id = a.cliente_id
            LEFT JOIN Asesores c ON c.id = a.asesor_id
            ORDER BY a.id DESC')->queryAll();

        return $this->asJson($clientes);
    }

    public function actionAutenticarFront($user, $clave){

        if( (!is_null($user) && !empty($user) && $user != null && $user !="") || ( !is_null($clave) && !empty($clave) && $clave != null && $clave !="")){                        
            $model = Asesores::find()->where(['usuario' => $user, 'clave' => $clave])->one();
            if($model){$respuesta = "SI";}else{$respuesta = "NO";}
        }else{$respuesta = "NO";}

        return $this->asJson($respuesta);
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
