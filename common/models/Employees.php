<?php

namespace common\models;

use Yii;

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
    public $fullName;
    public $myFile;

    public static function tableName()
    {
        return 'employees';
    }

    public function rules()
    {
        return [
            [['myFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, pdf'],
        ];
    }

    public function upload()
    {
        if (!is_dir(\Yii::getAlias('@webroot').'/images/uploads')) 
        {
            mkdir(\Yii::getAlias('@webroot').'/images/uploads');
        }
        if ($this->validate())
        {
            $this->myFile->saveAs('@webroot/images/uploads'.$this->imageFile->basename.' . '.$this->imageFile->extension);
        }
    }

    public function attributeLabels()
    {
        return [
            'eployeeNumber' => 'Hodim nomeri',
            'lastName' => 'Familiyasi',
            'firstName' => 'ismi',
        ];
    }

        // public function getOffice()
        // {
        //    return $this->hasOne(Offices::class(), ['officeCode' => 'officeCode']);  
        // }

    public function afterFind()
    {
        $this->fullName = $this->firstName .' '. $this->lastName;
    }

    
}