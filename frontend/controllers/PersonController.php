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
        $person->first_name = \Faker\Provider\en_US\Person::firstNameMale();
        $person->last_name = \Faker\Provider\en_US\Person::firstNameMale();
        $person->email = 'user@user.com';
        $person->gender = \Faker\Provider\en_US\Person::GENDER_MALE;
        $person->save(); // save() default true yani validatsiyadan otkazadi false bolsa togridan togri yozadi 
        // shu korinishda SQL code yozmasdan person jadvaliga INSERT qilib beradi 
    }
}