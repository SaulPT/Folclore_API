<?php

namespace api\controllers;

use api\models\Distrito;

class DistritoController extends \yii\rest\ActiveController
{

    public $modelClass = 'api\models\Distrito';


    public function actions()
    {
        return null;
    }


    public function actionIndex()
    {
        //FAZ SENTIDO REQUERER TOKEN APENAS PARA OBTER A LISTA DOS NOMES???
        //ACHO QUE NAO :)

        $nomes = array();
        foreach (Distrito::find()->all() as $distrito) {
            $nomes[$distrito['id'] - 1] = $distrito['nome'];
        }

        return $nomes;
    }
}
