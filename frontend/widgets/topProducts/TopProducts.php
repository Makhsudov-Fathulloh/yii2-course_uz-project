<?php

namespace frontend\widgets\topProducts;

use common\models\Products;
use yii\base\Widget;

class TopProducts extends Widget
{
    public $count = 10;
    
    public function run()
    {
        $model = Products::find()->limit($this->count)->all();
        TopProductsAssets::register($this->view);

        //$content = "<h2 class='top-product'> Salom {$this->ism}, men widget </h2>";
        // return $content;
        // return $this->render('topProductsView', ['ism' => $this->ism]);

        return $this->render('topProductsView', ['model' => $model]);
    }
}