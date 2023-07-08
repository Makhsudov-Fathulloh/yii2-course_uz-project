<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;

class PersonController extends Controller
{
    public function actionIndex()
    {
        $command = Yii::$app->db->createCommand("SELECT * FROM person");
        $result = $command->queryAll();

        return $this->render('index', ['data'=>$result]);
    }
}