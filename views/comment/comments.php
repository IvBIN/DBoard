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

<div>
<!--    <div class="topic_title">-->
<!--        --><?php //= $this->title ?><!--<br>-->
<!--        --><?php //= 'Автор: ' . $topicAuthor ?>
<!--    </div>-->

    <div class="comments">
        <?php foreach ($comments as $comment): ?>
            <div class="message">
                <?= $comment->date ?>
                <h3>
                    <?= $comment->user->login ?>
                </h3>
                <span>Договоры:
                <?= $comment->contracts ?>
                </span>
                <span>Отчеты:
                <?= $comment->reports ?>
                </span>

            </div>
        <?php endforeach; ?>
    </div>

    <div class="message__wrapper">
        <?php $msg = ActiveForm::begin() ?>

        <?= $msg->field($model, 'contracts')->textarea(['placeholder' => "Ваш комментарий", 'value' => '']) ?>
        <?= $msg->field($model, 'reports')->textarea(['placeholder' => "Ваш комментарий", 'value' => '']) ?>

        <?= Html::submitButton('Добавить', ['class' => 'msgBtn', 'disabled' => Yii::$app->user->isGuest]) ?>
        <?php ActiveForm::end() ?>
    </div>
</div>