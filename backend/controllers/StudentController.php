<?php

namespace backend\controllers;

use Yii;
use backend\models\Student;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class StudentController extends Controller
{
    public function actionIndex()
    {
        $students = Student::find()->all();
        return $this->render('index', ['students' => $students]);
    }

    public function actionCreate()
    {
        $model = new Student();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }
        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Student::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('Student not found.');
    }
}
