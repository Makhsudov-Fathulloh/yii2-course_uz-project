<?php

namespace frontend\controllers;

use frontend\models\PersonForm;
use yii\web\Controller;

class PersonController extends Controller
{
    public function actionIndex(){
        $model = new PersonForm();
        if($model->load(\Yii::$app->request->post())){
            if($model->validate() && $model->save()){
                \Yii::$app->session->setFlash('success', 'Bazaga yozildi'); 
                $model = new PersonForm();
            }
        }

        return $this->render('index', ['model'=>$model]);
    }
}