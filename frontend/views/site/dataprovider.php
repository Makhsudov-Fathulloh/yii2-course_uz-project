<?php

// echo \frontend\widgets\topProducts\TopProducts::widget(['ism' => 'Linux']);
echo \frontend\widgets\topProducts\TopProducts::widget(['ism' => 'Linux']);
echo "</br>";

/**
 * @var \yii\data\ActiveDataProvider @dataProvider
 */

 $model = $dataProvider->getModels();

 echo "<table class='table'>";
 echo "<tr>";
 echo "<th>";
 echo $dataProvider->sort->link('firstName');
 echo "</th>";
 echo "<th>";
 echo $dataProvider->sort->link('lastName');
 echo "</th>";
 echo "</tr>";
 foreach ($model as $item)
 {
    echo "<tr>";
    echo "<td>";
    echo $item->firstName; 
    echo "</td>";
    echo "<td>";
    echo $item->lastName;
    echo "</td>";
    echo "</tr>";
 }
 echo "</table>";

 echo \yii\widgets\LinkPager::widget([
    'pagination' => $dataProvider->pagination
 ]);