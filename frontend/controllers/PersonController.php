<?php

namespace frontend\controllers;

use common\models\Person;
use yii\web\Controller;
use Yii;

class PersonController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
  
    public function actionAdd()
    {
        $person = new Person();
        if ($person->load(Yii::$app->request->post())){ // object ka post dan kelayotkan malumotlarni yuklab oldik
            if ($person->save()){
                Yii::$app->session->setFlash("success", "Qo'shildi");
                $this->redirect('person/index');
            }
        }
        return $this->render('create', ['model'=>$person]);
    }
}