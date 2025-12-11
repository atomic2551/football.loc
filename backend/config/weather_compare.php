<?php

header("Content-Type: application/json; charset=utf-8");

// GET parametrlari
$city1 = $_GET['city1'] ?? null;
$city2 = $_GET['city2'] ?? null;

if (!$city1 || !$city2) {
    echo json_encode(["error" => "city1 va city2 ko'rsatilishi shart"]);
    exit;
}

// Fake weather data (demo)
// Bu joyni keyinchalik real API ga almashtiramiz
$weatherData = [
    "Tashkent" => 18,
    "Samarkand" => 16,
    "Bukhara" => 20,
    "Andijan" => 15
];

// Har ikkala shahar ro'yxatda borligini tekshiramiz
if (!isset($weatherData[$city1]) || !isset($weatherData[$city2])) {
    echo json_encode(["error" => "Ko'rsatilgan shaharlardan biri topilmadi"]);
    exit;
}

$temp1 = $weatherData[$city1];
$temp2 = $weatherData[$city2];

// Qaysi shahar issiqroq?
if ($temp1 > $temp2) {
    $result = "$city1 issiqroq";
} elseif ($temp1 < $temp2) {
    $result = "$city2 issiqroq";
} else {
    $result = "Har ikkala shahar harorati teng";
}

// JSON javob
echo json_encode([
    "city1" => ["name" => $city1, "temp" => $temp1],
    "city2" => ["name" => $city2, "temp" => $temp2],
    "result" => $result
], JSON_UNESCAPED_UNICODE);

