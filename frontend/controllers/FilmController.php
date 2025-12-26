<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\web\Response;

class FilmController extends Controller
{
    public $enableCsrfValidation = false;

    // JSON formatni sozlash
    public function beforeAction($action)
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        return parent::beforeAction($action);
    }

    /**
     * /api/films/rating?min=8
     * Reytingi min dan yuqori bo‘lgan filmlar ro‘yxatini qaytaradi.
     */
    public function actionRating($min = 0)
    {
        // Ma'lumotlar bazasi o‘rnida oddiy massiv ishlatilmoqda
        $films = [
            ['title' => 'Inception', 'rating' => 8.8, 'year' => 2010],
            ['title' => 'Avatar', 'rating' => 7.8, 'year' => 2009],
            ['title' => 'Interstellar', 'rating' => 8.6, 'year' => 2014],
            ['title' => 'The Dark Knight', 'rating' => 9.0, 'year' => 2008],
            ['title' => 'Titanic', 'rating' => 7.9, 'year' => 1997],
            ['title' => 'The Matrix', 'rating' => 8.7, 'year' => 1999],
            ['title' => 'Joker', 'rating' => 8.4, 'year' => 2019],
        ];

        // min qiymatini so‘rovdan olish (agar GET orqali yuborilsa)
        $minRating = Yii::$app->request->get('min', $min);

        // Filterlash: faqat reytingi min dan yuqori filmlar
        $filtered = array_filter($films, function ($film) use ($minRating) {
            return $film['rating'] >= (float)$minRating;
        });

        // Natijani tartiblab chiqish (yuqori reytingdan pastgacha)
        usort($filtered, function ($a, $b) {
            return $b['rating'] <=> $a['rating'];
        });

        // Javobni JSON formatda qaytarish
        return [
            'status' => 'ok',
            'min_rating' => (float)$minRating,
            'count' => count($filtered),
            'films' => array_values($filtered),
        ];
    }
}
