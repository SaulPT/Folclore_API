<?php

namespace api\controllers;

class GrupoController extends \yii\rest\ActiveController
{
    public $modelClass = 'api\models\Grupo';


    public function actions()
    {
        //DESABILITAR TODAS AS FUNÇÕES CRUD EXCEPTO O INDEX E O VIEW (GET)
        $actions = parent::actions();
        unset($actions['create'], $actions['delete'], $actions['update'], $actions['options']);
        return $actions;
    }

}
