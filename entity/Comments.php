<?php

namespace app\entity;

class Comments extends \yii\db\ActiveRecord
{
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}