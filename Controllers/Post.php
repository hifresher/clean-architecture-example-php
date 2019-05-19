<?php
namespace Controllers;

use Interfaces;
use Exception;

/**
 * コメント追加コントローラ
 */
class Post
{
    private $commentService;

    public function __construct(Interfaces\ICommentService $commentService)
    {
        $this->commentService = $commentService;
    }

    public function main(): void
    {
        // in
        // ※ ここでは個別の変数に割り当てているが、リクエストをモデルにするのも良い。
        $commenter = $_POST['commenter'] ?? "";
        $contents = $_POST['contents'] ?? "";

        // check
        // ※ Validation。実験用のためかなり処理を省いているため注意。本番用のWEBアプリでは、Validation失敗時はユーザーに通知する処理に流すのが良い。
        // その際はなぜエラーなのかも出せるほうが親切。
        if (
            empty($commenter) || !is_string($commenter) || mb_strlen($commenter) > 16 ||
            empty($contents) || !is_string($contents) || mb_strlen($contents) > 600 
        )
            throw new Exception("Validation Failed."); // ※ いきなり例外処理で止めるのはかなり乱暴

        // logic
        $this->commentService->add($commenter, $contents);

        // redirect
        header('Location: ?p=View');
        exit;
    }
}
