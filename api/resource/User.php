<?php

namespace api\resource;

class User extends \common\models\Post
{
    public function fields(): array
    {
        return ['id', 'username', 'email', 'status_id'];
    }

    public function getCreatedBy()
    {
        return $this->hasMany(Post::class, ['id' => 'created_by']);
    }

}