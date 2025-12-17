<?php
namespace backend\controllers;

use yii\web\Controller;
use yii\web\Response;

class WeatherController extends Controller
{
    public function actionCompare($city1 = null, $city2 = null)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;

        if (!$city1 || !$city2) {
            return ["error" => "city1 va city2 ko'rsatilishi shart"];
        }

        $weatherData = [
            "Tashkent" => 18,
            "Samarkand" => 16,
            "Bukhara" => 20,
            "Andijan" => 15
        ];

        if (!isset($weatherData[$city1], $weatherData[$city2])) {
            return ["error" => "Ko'rsatilgan shaharlardan biri topilmadi"];
        }

        return [
            "city1" => ["name" => $city1, "temp" => $weatherData[$city1]],
            "city2" => ["name" => $city2, "temp" => $weatherData[$city2]],
            "result" => $weatherData[$city1] > $weatherData[$city2]
                ? "$city1 issiqroq"
                : "$city2 issiqroq"
        ];
    }
}
