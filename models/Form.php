<?php

namespace app\models;
class Form extends \yii\base\Model
{
    public $file;
    public function rules()
    {
        return [
            ['file', 'file', 'skipOnEmpty' => false, 'extensions' => 'xls']
        ];
    }
}