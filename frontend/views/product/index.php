<?php

/**
 * @var \yii\data\ActiveDataProvider $dataProvider
 */

 echo "<div class='row'>";
 echo $dataProvider->sort->link('productCode');
 echo $dataProvider->sort->link('productName');
 echo \yii\widgets\ListView::widget([
    'dataProvider' => $dataProvider,
    // itemda 1 malumotni olib unga css shunga oxshagan o'zgarish qilishimiz mumkun, shu nomdagi view nilan 
    'itemView' => 'item',
    'options' => [
        'tag' => 'div',
        'class' => 'list-wrapper',
        'id' => 'list-wrapper',
    ],
    'layout' => "{summary}\n{items}\n{pager}", 
    // 'summary' => 'Jami <b>{totalCount}</b> tadan {count} tasi ko`rsatilyapti',
    'pager' => [
        'firstPageLabel' => 'first ',
        'lastPageLabel' => ' last',
        'nextPageLabel' => ' next ',
        'prevPageLabel' => ' prev ',
        'maxButtonCount' => 3,
    ],

 ]);
 echo "</div>";
 
 