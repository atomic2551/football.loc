<?php

namespace backend\models;

use yii\db\ActiveRecord;

class Task extends ActiveRecord
{
    public static function tableName()
    {
        return '{{%tasks}}';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['is_done'], 'boolean'],
        ];
    }
}
