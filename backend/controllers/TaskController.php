<?php

namespace backend\controllers;

use yii\rest\Controller;
use Yii;
use backend\models\Task;

class TaskController extends Controller
{
    public function actionCreate()
    {
        $data = Yii::$app->request->post();
        $model = new Task();
        $model->load($data, '');
        if ($model->save()) {
            return ['success' => true, 'data' => $model];
        }
        return ['success' => false, 'errors' => $model->errors];
    }

    public function actionList()
    {
        return Task::find()->all();
    }

    public function actionView($id)
    {
        return Task::findOne($id);
    }

    public function actionUpdate($id)
    {
        $model = Task::findOne($id);
        if (!$model) return ['success' => false, 'message' => 'Task not found'];
        $data = Yii::$app->request->post();
        $model->load($data, '');
        if ($model->save()) {
            return ['success' => true, 'data' => $model];
        }
        return ['success' => false, 'errors' => $model->errors];
    }

    public function actionDelete($id)
    {
        $model = Task::findOne($id);
        if (!$model) return ['success' => false, 'message' => 'Task not found'];
        if ($model->delete()) {
            return ['success' => true];
        }
        return ['success' => false];
    }
}
