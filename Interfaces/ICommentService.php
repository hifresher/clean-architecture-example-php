<?php
namespace Interfaces;

/**
 * ユーザーコメント管理のインターフェイス
 */
interface ICommentService
{
    public function add(string $commenter, string $contents): void;
    public function getList(): array;
}
