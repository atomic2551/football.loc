<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\web\Response;
use common\models\students\SchoolStudent;
use common\models\students\UniversityStudent;

class StudentController extends Controller
{
    public function beforeAction($action)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }

    // GET /student/school
    public function actionSchool()
    {
        $student = new SchoolStudent("Ali");

        return $student->study();
    }

    // GET /student/university
    public function actionUniversity()
    {
        $student = new UniversityStudent("Vali");

        return $student->study();
    }
}
