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
        $model = new UserForm();

        if (Yii::$app->request->isPost) {
            $model->profile_pic = UploadedFile::getInstance($model, 'profile_pic');

            if ($model->profile_pic) {
                // Random nom yaratish
                $randomName = Yii::$app->security->generateRandomString() . '.' . $model->profile_pic->extension;
                $path = Yii::getAlias('@webroot/uploads/profile-pics/') . $randomName;

                if ($model->profile_pic->saveAs($path)) {
                    return $this->asJson([
                        'success' => true,
                        'file' => '/uploads/profile-pics/' . $randomName,
                    ]);
                }
            }
        }

        return $this->asJson(['success' => false]);
    }
}
