<?php
namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;

class UserForm extends Model
{
    public \;

    public function rules()
    {
        return [['profile_pic','file','skipOnEmpty'=>false,'extensions'=>'png,jpg,jpeg']];
    }
}
