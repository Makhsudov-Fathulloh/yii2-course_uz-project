<?php
namespace frontend\resource;

class Comment extends \common\models\Comment
{
    public function fields()
    {
        return ['id', 'title', 'body', 'post_id'];
    }

    public function extraFields() // expand
    {
        return ['post', 'created_at', 'updated_at', 'created_by'];

    }

    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}