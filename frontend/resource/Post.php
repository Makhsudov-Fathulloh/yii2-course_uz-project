<?php
namespace frontend\resource;

class Post extends \common\models\Post
{
    public function fields()
    {
        return ['id', 'title', 'body', 'comments'];
    }

    public function extraFields() // expand
    {
        return ['created_at', 'updated_at', 'created_by'];
    }

    public function getComments()
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }
}