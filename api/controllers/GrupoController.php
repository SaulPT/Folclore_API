<?php

namespace api\controllers;

use api\models\Grupo;
use api\models\UserToken;
use Yii;

class GrupoController extends \yii\rest\ActiveController
{
    public $modelClass = 'api\models\Grupo';


    public function actions()
    {
        dsfdsf
        sdfsdfds
        //DESABILITAR TODAS AS FUNÇÕES CRUD EXCEPTO O VIEW (GET)
        $actions = parent::actions();
        unset($actions['index'], $actions['create'], $actions['delete'], $actions['update'], $actions['options']);
        return $actions;
    }


    public function actionIndex()
    {
        //NESSECÁRIO REESCREVER PORQUE O INDEX POR DEFEITO SÓ DEVOLVE 20 RESULTADOS DE CADA VEZ :(
        return Grupo::find()->all();
    }


    public function actionUpdate($id)
    {
        $token = Yii::$app->request->headers->get('token');
        $user_token = UserToken::findOne(['token' => $token]);

        if ($user_token != null) {
            $grupos_administrados = $user_token->user->grupos;

            //VERIFICAR SE O GRUPO É ADMINISTRADO PELO USER

            $grupo_recebido = json_decode(Yii::$app->request->getRawBody());

            $grupo = Grupo::findOne($id);
            $grupo->nome = $grupo_recebido->nome;
            $grupo->abreviatura = $grupo_recebido->abreviatura;
            $grupo->concelho_id = $grupo_recebido->concelho_id;

            $grupo->data_criacao = $grupo_recebido->data_criacao;
            $grupo->logo = $grupo_recebido->logo;
            $grupo->save();

            return true;
        } else {
            throw new \Exception('Erro de autenticação');
        }


    }

}
