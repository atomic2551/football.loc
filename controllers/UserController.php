<?php
namespace app\controllers;
use Yii;
use yii\web\Controller;
use yii\web\UploadedFile;
use app\models\UserForm;

class UserController extends Controller
{
    public function actionUploadProfilePic()
    {
        \ = new UserForm();
        if(Yii::\->request->isPost){
            \->profile_pic = UploadedFile::getInstance(\,'profile_pic');
            if(\->profile_pic){
                \ = Yii::\->security->generateRandomString().'.'.\->profile_pic->extension;
                \ = Yii::getAlias('@webroot/uploads/profile-pics/').\;
                if(!is_dir(Yii::getAlias('@webroot/uploads/profile-pics'))){mkdir(Yii::getAlias('@webroot/uploads/profile-pics'),0777,True);}
                if(\->profile_pic->saveAs(\)){
                    return \->asJson(['success'=>true,'file'=>'/uploads/profile-pics/'.\]);
                }
            }
        }
        return \->asJson(['success'=>false]);
    }
}
