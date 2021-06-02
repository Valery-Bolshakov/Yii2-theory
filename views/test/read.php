<div class="col-md-12">
    <h2>Работа с моделями. Операция Read</h2>
    <?php
//    debug($model->getAttributes()); // мемтод getAttributes позволяет получить имена столбцов из таблицы(sql запросом)

    // (Пример создания формы)Затем создаем форму для заполнения таблицы значениями
    /*$form = \yii\widgets\ActiveForm::begin();
    echo $form->field($model, 'code');
    echo $form->field($model, 'name');
    echo $form->field($model, 'population');
    echo $form->field($model, 'status');  //Данного атрибута в таблице Нет - его надо создать в модели Country
    $form = \yii\widgets\ActiveForm::end();*/

//    debug($model->getAttributes()); // выводим массив с названиями колонок таблицы

//    После получения данных в контроллере "$countries = Country::find()->all();" можно вывести массив этих обьектов
//    debug($countries); // получили 10 обьектов в массиве, соответствующих 10ти записям в таблице countries

    /*Далее можно что нибудь делать с этими данными, например вывести в таблице:
    Создаем bootstrap таблицу и вносим в нее все полеченные методом all() данные:*/
    ?>
    <!--table.table + tab-->
<!--    <table class="table">
        <?php /*foreach ($countries as $country): */?>
            <tr>
                <td><?/*= $country->code */?></td>
                <td><?/*= $country->name */?></td>
                <td><?/*= $country->population */?></td>
                <td><?/*= $country->status */?></td>
            </tr>
        <?php /*endforeach; */?>
    </table>-->


    <table class="table">
        <?php foreach ($countries as $country): ?>
            <tr>
                <td><?= $country['code'] ?></td>
                <td><?= $country['name'] ?></td>
                <td><?= $country['population'] ?></td>
                <td><?= $country['status'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>


<!--    <table class="table">
        <?php /*foreach ($countries as $country) {
            echo '<tr>' .
                 '<td>' . $country['code'] . '</td>' .
                 '<td>' . $country['name'] . '</td>' .
                 '<td>' . $country['population'] . '</td>' .
                 '<td>' . $country['status'].  '</td>' .
                 '</tr>';
         } */?>
    </table>-->
</div>
