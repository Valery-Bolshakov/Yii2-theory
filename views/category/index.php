<?php foreach ($categories as $category): ?>
<!--Проходимся циклом по обьектам таблицы и обращаясь к свойству title выводим обьекты из этого столбца -->
    <h4><?= $category->title ?></h4>
<!--Далее попробуем вывести тавары (если они есть) из другой таблицы, свазянные с данными категориями.

Обращаемся к свойству products ($category->products) которое ссылается на метод getProducts
в модели Category где и установлена зависимость категорий в таблицах

Внимание! Обращаяться к свойству (например ->products) необходимо соответственно по названию
метода (например getProducts), который напишем в модели где описана связь. Регистр важен.-->
    <?php foreach ($category->products as $product): //данный запрос равен запросу $category->getProducts()->all ?>
<!--        Далее выводим обьекты из таблицы products которые соответствуют категориям из таблицы categories-->
        <p><?= $product->title ?> | <?= $product->price ?></p>
    <?php endforeach; ?>
    <hr>
<?php endforeach; ?>
