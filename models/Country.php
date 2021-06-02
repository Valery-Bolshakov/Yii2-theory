<?php


namespace app\models;


use yii\db\ActiveRecord;

class Country extends ActiveRecord // расширяет yii\db\ActiveRecord; для работы с БД
{
//    По соглашениям Название таблицы и Название класса должны совпадать и быть в ед числе
//    public $status;

    /** Если Название таблицы не совпадает с именем класса: */
    // обьявляем публичный статичный метод tableName()
    public static function tableName()
    {
//        return 'countries'; // и Вставляем несовпадающее имя таблицы (Вариант 1)
//        return '{{countries}}'; // Добавляем Экранирование, при неоходимости (Вариант 2)

//        Префикс % определяется в файле конфигурации db, добавлением свойства: пример 'tablePrefix' => 'wfm_'
//        И теперь имя таблицы '%countries' определится как 'wfm_countries'
        return '{{%countries}}'; // Добавляем Префикс, при неоходимости (Вариант 3)
    }

    public function rules()
    {
        return [
            [['code', 'name', 'population', 'status'], 'required'],
            ['code', 'unique'], // unique валидатор - проверка на уникальность ключа
            ['population', 'integer'], // Проверяет является ли входящее значение цулым числом
            ['status', 'boolean'], // Проверяет значение 0 или 1
        ];
    }

    public function attributeLabels()
    {
//        Проверит соответствие атрибута значению его лейбла
        return [
            'code' => 'Код страны',
            'name' => 'Страна',
            'population' => 'Население',
            'status' => 'Статус',
        ];
    }
}