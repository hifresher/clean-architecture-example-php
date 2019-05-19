<?php
namespace Controllers;

use Interfaces;

/**
 * コメントリスト表示コントローラ
 */
class View
{
    private $commentService;

    public function __construct(Interfaces\ICommentService $commentService)
    {
        $this->commentService = $commentService;
    }


    public function main(): void
    {
        // logic
        $list = $this->commentService->getList();

        // out
        require BASE_PATH . '/Views/View.php';
    }
}
