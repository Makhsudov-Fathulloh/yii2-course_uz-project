<?php

namespace api\controllers;

use api\resource\Comment;
use api\resource\Post;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\ActiveController;
use yii\web\ForbiddenHttpException;

class MyActiveController extends ActiveController
{
    public function behaviors(): array
    {
        $behaviors = parent::behaviors();

//        $behaviors['authenticator'] = [
//            'class' => HttpBearerAuth::class
//        ];

        $behaviors['authenticator']['only'] = ['create', 'update', 'delete'];
        $behaviors['authenticator']['authMethods'] = [
            HttpBearerAuth::class
        ];

        return $behaviors;
    }

    /**
     * @param string $action
     * @param Post|Comment $model
     * @param array $params
     * @throws ForbiddenHttpException
     */
    public function checkAccess($action, $model = null, $params = [])
    {
        if (in_array($action, ['update', 'delete']) && $model->created_by !== \Yii::$app->user->id) {
            throw new ForbiddenHttpException('You don\'t have permission to change this record');
        }
    }
}