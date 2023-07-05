<?php

namespace frontend\controllers;

use frontend\models\MyContact;
use yii\web\Controller;

class PostController extends Controller
{
    # public $defaultAction = 'index';

      public function actionIndex()
    { 
      $model = new MyContact();
      if (\Yii::$app->request->isPost){
          $formData = \Yii::$app->request->post();
          $model->attributes = $formData;
          
          # $model->malumot_1 = $formData ['malumot_1'];
          # $model->malumot_2 = $formData ['malumot_2'];

          if ($model->validate()){
            \Yii::$app->session->setFlash("success", "Validatsiyadan o'tdi");
          #  echo "Hammasi OK";
          # }else{
          #  print_r($model->getErrors());
          }
          # die();
      }
      return $this->render('index', ['model'=>$model]);
    }
}