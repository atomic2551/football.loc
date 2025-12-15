<?php

namespace backend\models;

use yii\db\ActiveRecord;

class Student extends ActiveRecord
{
    public static function tableName()
    {
        return 'students';
    }

    public function rules()
    {
        return [
            [['fullname', 'group', 'age'], 'required'],
            [['age'], 'integer'],
            [['fullname', 'group'], 'string', 'max' => 255],
        ];
    }
}
