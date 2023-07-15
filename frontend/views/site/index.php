<?php

/** 
 * @var yii\web\View $this 
 * @var \yii\data\Pagination $pagination
 * @var \yii\db\ActiveRecord $model
 * 
*/

use yii\widgets\LinkPager;

?>
        <div class="text-center">
            <h1 class="display-4">Congratulations!</h1>
        </div>

            <?php
            if (!Yii::$app->user->isGuest){
                echo "<h1>Xush kelibsiz<h1>";
                echo "</br>";
            }else {
                echo "<h1>Login qiling<h1>";
                echo "</br>";
            }

            foreach ($model as $item)
            {
                echo $item->firstName .' | '. $item->lastName;
                echo "</br>";
            }

            echo "</br>";
             echo LinkPager::widget([
                'pagination' => $pagination,
                'maxButtonCount'=>1,
                'prevPageLabel'=>'oldingi',
                'nextPageLabel'=>'keyingi'
            ]);

      
