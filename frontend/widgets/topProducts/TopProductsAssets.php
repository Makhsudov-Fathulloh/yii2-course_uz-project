<?php
namespace frontend\widgets\topProducts;

use yii\web\AssetBundle;

class TopProductsAssets extends AssetBundle
{
    // __DIR__ qayerga qoyilsa path ni ozi aniqlaydi. Bu xolatda __DIR__ = frontend/widgets/topProduct
    public $sourcePath = __DIR__."/assets";
    public $css = [
        'css/topProduct.css'
    ];

    public $js = [
        'js/topProduct.js'
    ];

    // css bilan ishlashda yordam beradi 
    public $publishOptions = [
        'forceCopy'=>YII_DEBUG
    ];
}