<?php

namespace app\controllers;

use app\models\CommentForm;
use app\repository\CommentRepository;
use app\repository\UsersRepository;
use yii\web\Controller;
use Yii;


class CommentController extends Controller
{
//    public function actionIndex()
//    {
//        $this->view->title = "Главная страница";
//        return $this->render("index", [
//            'sections' => CommentRepository::getComments()
//        ]);
//    }
    public function actionComments()
    {
//        $title = ForumRepository::getTopicsTitle(Yii::$app->request->get('id'));
//        $this->view->title = $title;
        $comments = CommentRepository::getComments();
//        $comments = CommentRepository::getComments(Yii::$app->request->get('id'));
//        $commentAuthor = UsersRepository::getUserById(CommentRepository::getCommentAuthor(
//            Yii::$app->request->get('id')
//        ));
        $this->view->title = "Comments";
        $this->layout = 'iframe2';

        $model = new CommentForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            CommentRepository::createComment(
//                $model->text,
                $model->contracts,
                $model->reports,
                Yii::$app->user->id
            );
            return $this->redirect('/comment/comments/');
        }
        return $this->render("comments", [
            'comments' => $comments,
            'model' => $model
        ]);
    }

}