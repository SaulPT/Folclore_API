<?php

namespace api\controllers;

use api\models\Noticia;

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
        return Noticia::find()->where(['ativo' => 1])->all();
    }

}
