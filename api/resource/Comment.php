<?php
namespace api\resource;

class Comment extends \common\models\Comment
{
    public function fields(): array
    {
        return ['id', 'title', 'body', 'post_id', 'created_by'];
    }

    public function extraFields(): array // expand
    {
        // return ['created_at', 'updated_at', 'created_by'];
        return ['post'];
    }

    public function getPost()
    {
        return $this->hasOne(Post::class, ['id' => 'post_id']);
    }
}