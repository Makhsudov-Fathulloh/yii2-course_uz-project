<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin([
    'id' => 'person-form',
    'options' => ['class' => 'form-horizontal'],
]);

echo $form->field($model, 'first_name'); #->passwordInpud();
echo $form->field($model, 'last_name');  #->textarea();
echo $form->field($model, 'email')->input('email');
// echo $form->field($model, 'gender');

echo $form->field($model, 'gender')->checkboxList(['erkak'=> 'Erkak', 'ayol' => 'Ayol']);

echo $form->field($model, 'gender')->dropdownList([
    'erkak' => 'Erkak', 
    'ayol' => 'Ayol '
],
['prompt'=>'Select gender']
);

echo Html::submitButton('Yuborish', ['class'=>'mt-3 btn btn-success']);


ActiveForm::end() ?>