<?php

namespace api\controllers;

use api\resource\Post;

class PostController extends MyActiveController
{
    public $modelClass = Post::class;

//    public $serializer = [
//        'class' => 'yii\rest\Serializer',
//        'collectionEnvelope' => 'data',
//    ];

     public $serializer = ["class" => 'common\components\Serializer'];
}