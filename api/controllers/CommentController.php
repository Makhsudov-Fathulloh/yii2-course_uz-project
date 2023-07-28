<?php

namespace api\controllers;

use api\resource\Comment;
use yii\data\ActiveDataProvider;

class CommentController extends MyActiveController
{
    public $modelClass = Comment::class;

//    public $serializer = [
//        'class' => 'yii\rest\Serializer',
//        'collectionEnvelope' => 'data',
//    ];

    public $serializer = ["class" => 'common\components\Serializer'];

    public function actions(): array
    {
        $actions = parent::actions();
        $actions['index']['prepareDataProvider'] = [$this, 'prepareDataProvider'];

        return $actions;
    }

    public function prepareDataProvider(): ActiveDataProvider
    {
        return new ActiveDataProvider([
            'query' => $this->modelClass::find()->andWhere(['post_id' => \Yii::$app->request->get('postId')])
        ]);
    }
}