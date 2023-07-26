<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();

echo $form->field($model, 'first_name'); 
echo $form->field($model, 'last_name');
echo $form->field($model, 'email');
echo $form->field($model, 'gender');

echo Html::submitButton('Send', ['class' => 'btn btn-success']);

ActiveForm::end();