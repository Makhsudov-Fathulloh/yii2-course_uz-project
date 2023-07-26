<?php

namespace frontend\controllers;

use common\models\Person;
use yii\db\Query;
use yii\web\Controller;
use Yii;

class PersonController extends Controller
{
    public function actionIndex()
    {
        $users = Person::find()->where(['id'=>14])->one();
  
        return $this->render('index', ['users_ar' => $users]);
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



