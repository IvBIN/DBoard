<?php

namespace app\entity;

use app\repository\UsersRepository;
use yii\web\IdentityInterface;

/**
 *Users
 * @property integer id ID пользователя
 * @property string login логин пользователя
 * @property string password пароль пользователя
 * @property string photo аватар пользователя
 *
 */
class Users extends \yii\db\ActiveRecord implements IdentityInterface
{
    public static function findIdentity($id)
    {
        return new static(UsersRepository::getUserById($id));
    }

    public function getId()
    {
        return $this->id;
    }

    public function validatePassword($password)
    {
        return password_verify($password, $this->password);
    }

    public function findUserByLogin($login)
    {
        return new static(UsersRepository::getUserByLogin($login));
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // TODO: Implement findIdentityByAccessToken() method.
    }

    public function getAuthKey()
    {
        // TODO: Implement getAuthKey() method.
    }

    public function validateAuthKey($authKey)
    {
        // TODO: Implement validateAuthKey() method.
    }
}