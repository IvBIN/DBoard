<?php

namespace app\models;

use app\repository\UsersRepository;
use yii\base\Model;

class RegistrationModel extends Model
{
    public $login;
    public $password;
    public $passwordRepeat;
    public $avatar;

    public function rules()
    {
        return [
            [['login', 'password', 'passwordRepeat'], 'required'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password'],
            ['login', 'validateLogin'],
            ['avatar', 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg']
        ];
    }

    public function validateLogin($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = UsersRepository::getUserByLogin($this->login);
            if ($user) {
                $this->addError($attribute, 'Такой пользоватль уже существует!');
            }
        }
    }

    public function attributeLabels()
    {
        return [
            'login' => 'Логин',
            'password' => 'Пароль',
            'passwordRepeat' => 'Повторённый пароль',
        ];
    }
}