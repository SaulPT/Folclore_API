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
        //NESSECÁRIO REESCREVER PORQUE O INDEX POR DEFEITO SÓ DEVOLVE 20 RESULTADOS DE CADA VEZ :(
        return Concelho::find()->all();
    }
}
