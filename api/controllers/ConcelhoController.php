<?php

namespace api\controllers;

use api\models\Concelho;

class ConcelhoController extends \yii\rest\ActiveController
{

    public $modelClass = 'api\models\Concelho';


    public function actions()
    {
        return null;
    }


    public function actionIndex()
    {
        //FAZ SENTIDO REQUERER TOKEN APENAS PARA OBTER A LISTA DOS NOMES???
        //ACHO QUE NAO :)

        $nomes = array();
        foreach (Concelho::find()->all() as $concelho) {
            $nomes[$concelho['id'] - 1] = $concelho['nome'];
        }

        return $nomes;
    }
}
