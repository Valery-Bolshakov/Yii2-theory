<?php

// Создали функцию для дебага и удобного просмотра данных
// Подключаем её в фронтконтроллере web/index.php: require_once __DIR__ . '/../libs/functions.php';


function debug($data, $die = false)
{
    echo "<pre>" . print_r($data, 1) . "</pre>";
    if ($die) {
        die; // если die true то выходим из функции
    }
}

