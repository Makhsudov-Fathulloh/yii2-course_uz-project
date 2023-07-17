<?php

namespace frontend\widgets\topProducts;

use yii\base\Widget;

class TopProducts extends Widget
{
    public $ism = "Test";

    public function run()
    {
        TopProductsAssets::register($this->view);
        //$content = "<h2 class='top-product'> Salom {$this->ism}, men widget </h2>";
        // return $content;
        return $this->render('topProductsView', ['ism' => $this->ism]);
    }
}