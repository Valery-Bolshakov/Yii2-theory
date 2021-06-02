<?php


namespace app\controllers;



class PostCommentController extends AppController
{
    // "web/post-comment/index" - Контроллеры состоящие из нескольких слов в адресе будут выгоядеть так

    public function actionIndex()
    {
        return __METHOD__; // app\controllers\PostCommentController::actionIndex - Возвращаем название метода.
    }

}