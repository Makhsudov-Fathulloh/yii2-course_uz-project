<?php
namespace api\resource;

class Post extends \common\models\Post
{
    public function fields(): array
    {
        return ['id', 'title', 'body',
            'created_by'];
    }

    public function extraFields(): array // expand
    {
        // return ['created_at', 'updated_at', 'created_by'];
        return ['comments'];
    }

    public function getComments()
    {
        return $this->hasMany(Comment::class, ['post_id' => 'id']);
    }
}