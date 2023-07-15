<?php

namespace common\models;

/**
 * Class Employees model
 * @package frontend/models 
 * 
 * @property integer @employeeNumber
 * @property string @firstName
 * @property string @lastName 
 * @property string @extension
 * @property string @email
 * @property integer @officeCode
 */

class Employees extends \yii\db\ActiveRecord
{
    public $fullname;
    public $myFile;

    public static function tableName()
    {
        return 'employees';
    }
}