<?php
namespace Controllers;

use Exception;

/**
 * エラーコントローラ
 */
class Error
{
    public function main(Exception $e): void
    {
        // out
        require BASE_PATH . '/Views/Error.php';
    }
}
