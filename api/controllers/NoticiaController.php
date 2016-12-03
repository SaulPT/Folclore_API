<?php

namespace api\controllers;

use api\models\Noticia;
use api\models\UserToken;

class NoticiaController extends \yii\rest\ActiveController
{
    public $modelClass = 'api\models\Noticia';


    public function actions()
    {
        //DESABILITAR TODAS AS FUNÇÕES CRUD PARA DEPOIS CRIARMOS AS NOSSAS ACTIONS
        return null;
    }

    public function actionIndex()
    {
        $token = \Yii::$app->request->getHeaders()->get('token');

        if (!empty(UserToken::findOne(['token' => $token]))) {
            return Noticia::find()->all();
        } else {
            throw new \Exception('Erro de autenticação');
        }
    }

}
