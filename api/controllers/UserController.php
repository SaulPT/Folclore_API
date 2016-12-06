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
                'login' => ['get']
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
        $username = Yii::$app->request->get('username');
        $password = Yii::$app->request->get('password');
        $dispositivo = Yii::$app->request->get('dispositivo');

        $utilizador = User::findOne(['username' => $username]);

        if ($utilizador != null && $dispositivo != null
            && Yii::$app->security->validatePassword($password, $utilizador->password_hash)
        ) {

            $token_utilizador = $utilizador->getUserTokens()->where(['dispositivo' => $dispositivo])->one();


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

            return json_encode($resultado);

        } else {
            throw new \Exception('Erro de autenticação');
        }
    }


}
