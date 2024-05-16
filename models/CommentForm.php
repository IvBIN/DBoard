<?php

namespace app\models;

class CommentForm extends \yii\base\Model
{
//    public $text;
    public $contracts;
    public $reports;

    public function rules()
    {
        return [
            ['contracts', 'required'],
            ['contracts', 'string'],
            ['reports', 'required'],
            ['reports', 'string']
        ];
    }

    public function attributeLabels()
    {
        return [
            'contracts' => "Комментарий : Договоры",
            'reports' => "Комментарий : Отчеты"
        ];
    }
}