<?php
require_once '../config.php';
require_once '../autoloader.php';

// 依存関係の登録
$commentRepository = new Repositories\LocalFileCommentRepository();
$commentService = new UseCases\CommentService($commentRepository);

// ルーティング
switch ($_GET['p'] ?? DEFAULT_PAGE) {
    case 'Post':
        $controller = new Controllers\Post($commentService);
        break;
    case 'View':
        $controller = new Controllers\View($commentService);
        break;
}

try {
    // 起動
    $controller->main();
} catch (Exception $e) {
    $errorController = new Controllers\Error();
    $errorController->main($e);
}
