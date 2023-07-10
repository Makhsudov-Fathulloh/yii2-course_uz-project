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
        $users_query = (new Query())->from('person')->one();
        // Query()da massiv turida malumot keladi 
        // $users_query = (new Query())->from('person')->all();
        // $users_query = (new Query())->from('person')->count();
        // $users_query = (new Query())->from('person')->sum();
        // $users_query = (new Query())->from('person')->average();
        // $users_query = (new Query())->from('person')->max();
        // $users_query = (new Query())->from('person')->min();
        // $users_query = (new Query())->from('person')->scalar();
        // $users_query = (new Query())->from('person')->exists();

        // {
        //$users = Person::find()->one();
        // ActiveRecorddan 1 malumot uchun katta xajmda object keladi (errors, validators, scenario, events....)
        // $users = Person::find()->all();
        // $users = Person::find()->count();
        // $users = Person::find()sum('id');
        // $users = Person::find()->average('id');
        // $users = Person::find()-<max();
        // $users = Person::find()->min();
        // $users = Person::find()->scalar();
        // $users = Person::find()->exists();

        // id = 2 bulgan person malumotini qaytaradi
        // SELECT * FROM `person` WHERE `id` = 2
        // $users = Person::findOne(2);

        // SELECT * FROM `person` WHERE `id` = 12 AND `email` = 'user12@user.com'
        // $users = Person::findOne([
        //  'id' => 12,
        //  'email' => user12@user.com
        //]);

        // id = 10, 11, 12, 4  bulgan person malumotini qaytaradi
        // SELECT * FROM `person` WHERE `id` IN (10, 11, 12, 4)
        // $users = Person::findAll([10, 11, 12, 4]);

        // email shunday bulgan person malumotini qaytaradi
        // SELECT * FROM `person` WHERE `status` = 0
        // $users = Person::findAll(['email' => user10@user.com]);

        // ActiveRecord ning where() function ni ishlatib
        // $users = Person::find()
        // ->where(['email' => user10@user.com])
        // ->limit(3)
        // ->all();

         // ActiveRecord da SQL surovini ishlatishda 
          $email = 'user1@user.com';
          $sql = "SELECT * FROM person WHERE email=:email"; // 
          $users = Person::findBySql($sql, [':email'=>$email])->where([])->limit(3); 
         // findBySql da SQL dan tashqari malumotlarni korsatish mumkun (bayend qilamiz)
         // agar massiv (array) korinishida xoxlasak
         // $users = Person::findBySql($sql, [':email'=>$email])->asArray()->all(); 
         // }

        return $this->render('index', ['users_q' => $users_query, 'users_ar' => $users]);
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



