<?php

namespace app\repository;

use app\entity\Comments;

class CommentRepository
{
//    public static function getTopicAuthor($id)
//    public static function getCommentAuthor($id)
//    {
//        return Comments::find()->where(['id' => $id])->one()->user_id;
//    }

    public static function getComments()
    {
        return Comments::find()->all();
    }

    public static function createComment($contracts, $reports, $user_id)
    {
        $comment = new Comments();
        $comment->contracts = $contracts;
        $comment->reports = $reports;
        $comment->user_id = $user_id;
        $comment->save();
        return $comment->id;
    }

}