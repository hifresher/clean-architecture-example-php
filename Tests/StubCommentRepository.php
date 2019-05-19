<?php
namespace Tests;

use Interfaces;
use Entities;

/**
 * テスト用スタブ
 */
class StubCommentRepository implements Interfaces\ICommentRepository
{
    private $commentList = [];

    public function add(Entities\Comment $comment): void
    {
        $this->commentList[] = $comment;
    }

    public function load(): array
    {
        return $this->commentList;
    }
}
