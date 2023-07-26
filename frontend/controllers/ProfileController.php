<?php

namespace frontend\controllers;

use common\models\Client;
use common\models\Order;
use yii\web\Controller;

class ProfileController extends Controller
{
    public function actionIndex()
    {
        $model = Order::find()->where(['id'=>1])->one(); 

        // with() da relation nomi korsatilib, barcha SQL surovlarni o'z ichiga oladi  
        // $model = Client::find()->where(['id'=>1])->with('orders')->one(); 

        return $this->render('index', ['model'=>$model]);
    }
}