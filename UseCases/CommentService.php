<?php
namespace UseCases;

use Entities;
use Interfaces;

/**
 * ユーザーコメント管理
 */
class CommentService implements Interfaces\ICommentService
{
    private $commentRepository;

    public function __construct(Interfaces\ICommentRepository $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    public function add(string $commenter, string $contents): void
    {
        $comment = Entities\Comment::create($commenter,  $contents);
        $this->commentRepository->add($comment);
    }

    public function getList(): array
    {
        return $this->commentRepository->load();
    }
}
