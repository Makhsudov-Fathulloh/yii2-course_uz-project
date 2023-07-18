<?php 

namespace frontend\controllers;

use yii\web\Controller;
use common\models\Products;
use yii\data\ActiveDataProvider;

class ProductController extends Controller
{
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find(),
        ]);
       return  $this->render('index', [
            'dataProvider' => $dataProvider
       ]);
    }
}