<?php
namespace backend\controllers;

use yii\web\Controller;
use yii\web\Response;
use Yii;
use backend\models\ElectronicProduct;

class Oop3InheritanceController extends Controller
{
    // JSON formatini standart qilib qo'yamiz
    public $enableCsrfValidation = false;

    public function behaviors()
    {
        return [
            'contentNegotiator' => [
                'class' => 'yii\filters\ContentNegotiator',
                'formats' => [
                    'application/json' => Response::FORMAT_JSON,
                ],
            ],
        ];
    }

    /**
     * POST API endpoint
     * URL: http://yourdomain.com/oop3-inheritance/add-example
     */
    public function actionAddExample()
    {
        $request = Yii::$app->request;
        $data = $request->post();  // POST orqali kelgan ma'lumotlar

        $name = $data['name'] ?? 'Unknown';
        $price = $data['price'] ?? 0;
        $warranty = $data['warranty'] ?? 0;

        // ElectronicProduct obyektini yaratish
        $product = new ElectronicProduct($name, $price, $warranty);

        // Natijani JSON formatida qaytarish
        return [
            'message' => $product->getInfo(),
            'warranty_info' => $product->getWarrantyInfo(),
        ];
    }
}
