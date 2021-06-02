<?php foreach ($products as $product): ?>
<p><?= $product->title ?> | <?= $product->price ?> | Category: <?= $product->category->title ?></p>
<!--Category: $product->category->title Данный тайтл получаем через связь getCategory в модели Product-->
<?php endforeach; ?>
