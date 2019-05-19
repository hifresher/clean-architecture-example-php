<?php
namespace Entities;

/**
 * ユーザーコメント
 */
class Comment
{
    public $created; // 発言日
    public $commenter; //コメントした人の名前
    public $contents; // コメント内容

    public static function create(string $commenter, string $contents): Comment
    {
        $comment = new Comment();
        $comment->commenter = $commenter;
        $comment->contents = $contents;
        $comment->created = date("Y/m/d H:i:s");

        return $comment;
    }

    public static function createFromArray(array $arr): Comment
    {
        $comment = new Comment();
        $comment->created = $arr[0];
        $comment->commenter = $arr[1];
        $comment->contents = $arr[2];
        return $comment;
    }
}
