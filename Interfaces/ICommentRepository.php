<?php
namespace Interfaces;

use Entities;

/**
 * コメントリポジトリのインターフェイス
 */
interface ICommentRepository
{
    public function add(Entities\Comment $comment): void;
    public function load(): array;
}
