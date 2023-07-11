<?php

namespace frontend\controllers;

use common\models\Client;
use yii\web\Controller;

class ProfileController extends Controller
{
    public function actionIndex()
    {
        $model = Client::find()->all(); //->where(['id'=>1])->one();

        return $this->render('index', ['model'=>$model]);
    }
}