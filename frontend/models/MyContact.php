<?php

namespace frontend\models;

use yii\base\Model;

class MyContact extends Model
{
    public $malumot_1;
    public $malumot_2;

    public function rules()
    {
        return [
            [['malumot_1', 'malumot_2'], 'required'],
        ];
    }
}