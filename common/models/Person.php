<?php

namespace common\models;

use yii\db\ActiveRecord;

class Person extends ActiveRecord
{
    public static function tableName()
    {
        return '{{person}}';
    }

    public function rules()
    {
        return [
            [['first_name', 'last_name', 'email', 'gender'], 'required'],
            [['first_name', 'last_name', 'email'], 'string']
        ];
    }
}