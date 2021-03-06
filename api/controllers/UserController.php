<?php

namespace api\controllers;

use api\models\User;
use api\models\UserToken;
use Yii;

class UserController extends \yii\rest\ActiveController
{

    public $modelClass = 'api\models\User';


    public function behaviors()
    {
        //PERMITE APENAS O METODO GET PARA O LINK "user/login"
        $behaviors = parent::behaviors();

        $behaviors['verbs'] = [
            'class' => \yii\filters\VerbFilter::className(),
            'actions' => [
                'login' => ['get'],
                'grupos' => ['get'],
                ],
        ];

        return $behaviors;
    }


    public function actions()
    {
        //DESABILITAR TODAS AS FUNÇÕES CRUD PORQUE APENAS QUEREMOS AUTENTICAR EM "/login"
        return null;
    }


    public function actionLogin()
    {
        $username = Yii::$app->request->headers->get('username');
        $password = Yii::$app->request->headers->get('password');
        $dispositivo = Yii::$app->request->headers->get('dispositivo');

        $utilizador = User::findOne(['username' => $username]);

        if ($utilizador != null && $dispositivo != null
            && Yii::$app->security->validatePassword($password, $utilizador->password_hash)
        ) {

            $token_utilizador = $utilizador->getUserTokens()->where(['dispositivo' => $dispositivo])->one();

            $resultado = array();
            $resultado['username'] = $utilizador->username;

            if ($token_utilizador == null) {
                $token_gerado = hash('sha256', $utilizador->username . $utilizador->password_hash . $dispositivo . time());

                $novo_user_token = new UserToken();
                $novo_user_token->user_id = $utilizador->id;
                $novo_user_token->token = $token_gerado;
                $novo_user_token->dispositivo = $dispositivo;
                $novo_user_token->save();

                $resultado['token'] = $token_gerado;
            } else {
                $resultado['token'] = $token_utilizador->getAttribute('token');
            }

            return $resultado;

        } else {
            throw new \Exception('Erro de autenticação');
        }
    }


    public function actionGrupos()
    {
        $token = Yii::$app->request->headers->get('token');
        $user_token = UserToken::findOne(['token' => $token]);

        if ($user_token != null) {
            return $user_token->user->grupos;
        } else {
            throw new \Exception('Erro de autenticação');
        }

    }

}
