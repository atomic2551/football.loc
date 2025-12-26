<?php
namespace app\controllers;

use yii\web\Controller;
use yii\web\UploadedFile;
use yii\web\Response;

class UploadController extends Controller
{
    public $enableCsrfValidation = false;

    public function actionRenameRandom()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        $file = UploadedFile::getInstanceByName('file'); // POST’da file nomi 'file' bo'lishi kerak

        if ($file) {
            $randomName = uniqid() . '.' . $file->extension;
            $uploadPath = \Yii::getAlias('@webroot') . '/upload/' . $randomName;

            if ($file->saveAs($uploadPath)) {
                // Fayl hajmini olish (byte’da)
                $fileSize = filesize($uploadPath);

                return [
                    'success' => true,
                    'filename' => $randomName,
                    'size_bytes' => $fileSize
                ];
            } else {
                return ['success' => false, 'message' => 'Fayl saqlanmadi'];
            }
        }

        return ['success' => false, 'message' => 'Fayl topilmadi'];
    }
}
