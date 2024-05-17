<?php
/**
 * @var $comments ,
// * @var $topicAuthor ,
 * @var $model
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

//var_dump($messages[0]->user);
//var_dump($model);
?>

<div class="comment_page">
<!--    <div class="topic_title">-->
<!--        --><?php //= $this->title ?><!--<br>-->
<!--        --><?php //= 'Автор: ' . $topicAuthor ?>
<!--    </div>-->
    <h2>Комментарии</h2>
    <div class="comments">
        <?php foreach ($comments as $comment): ?>
            <div class="comment">
                <span class="date"><?= $comment->date ?></span>
                <h3 class="user_login">
                    <b><?= $comment->user->login ?></b>
                </h3>
                <div class="user_comment">
                    <span><b>Договоры: </b><br>
                    <?= $comment->contracts ?>
                    </span><br>
                    <span><b>Отчеты: </b><br>
                    <?= $comment->reports ?>
                </span>
                </div>

            </div>
        <?php endforeach; ?>
    </div>

    <div class="comment__wrapper">
        <?php $msg = ActiveForm::begin() ?>

        <span class="title_comment"><?= $msg->field($model, 'contracts')->textarea(['placeholder' => "Ваш комментарий", 'value' => '']) ?></span>
        <span class="title_comment"><?= $msg->field($model, 'reports')->textarea(['placeholder' => "Ваш комментарий", 'value' => '']) ?></span>

        <?= Html::submitButton('Добавить', ['class' => 'comBtn', 'disabled' => Yii::$app->user->isGuest]) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>

<style>
    .comment_page {
        background: #FFFFFF;
    }
    h2 {
        display: block;
        text-align: center;
        font-weight: bold;
        color: #032557;
        /*margin-left: 10px;*/
    }
    .comments {
        display: block;
        width: 283px;
        height: 470px;
        border: 1px solid #70bdf6;
        border-radius: 5px;
        /*box-sizing: border-box;*/
        margin: 0 auto;
        scroll-behavior: smooth;
        /*gap: 3px;*/
        overflow-y: scroll;
    }
    .comment {
        width: 276px;
        padding: 5px;
        color: #032557;
        border: 1px solid #70bdf6;
        border-radius: 5px;
        background: #e6eafa;
        margin-top: 10px;

    }
    .date {
        display: block;
        text-align: right;
    }
    .user_login {
        border-top-left-radius: 5px;
        background: linear-gradient(0, #e6eafa, #70bdf6);
    }
    .user_comment {
        border: 3px solid #92c2e1;
        border-radius: 5px;
        box-shadow:
                inset 1px 1px #92c2e1;

        padding: 3px;
        opacity: 0.7;

    }

    .title_comment {
        font-family: "Colibri", sans-serif;
        font-weight: bold;
        color: #040462;
    }
    .comment__wrapper {
        /*display: block;*/
        width: 280px;
        max-height: 205px;
        border-radius: 5px;
        margin-top: 20px;
        padding: 3px;
        position: fixed;
        background: #92c2e1;
        overflow-y: scroll;
    }
    .comBtn {
        width: max-content;
        height: max-content;
        text-decoration: none;
        font-size: 12px;
        padding: 2px;
        margin: 3px 10px;
        /*padding: 5px;*/
        background: #3C578C;
        border-radius: 5px;
        color:  #d9d6d6;
    }
</style>