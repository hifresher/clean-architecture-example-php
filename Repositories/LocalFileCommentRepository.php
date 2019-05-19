<?php
namespace Repositories;

use Interfaces;
use Entities;

/**
 * ユーザーコメントをローカルファイルにRead/Writeする
 */
class LocalFileCommentRepository implements Interfaces\ICommentRepository
{
    private $path;

    public function __construct(string $path = null)
    {
        $filename = $path ?? 'default.dat';
        $this->path = DATA_PATH . $filename;
    }

    public function add(Entities\Comment $comment): void
    {
        $file = new \SplFileObject($this->path, 'a+');
        if ($file->fstat() === false)
            throw new \RuntimeException("File open error.");

        try {
            if (!$file->flock(LOCK_EX))
                throw new \RuntimeException("Failed to lock the file.");

            if ($file->fputcsv((array)$comment) === false)
                throw new \RuntimeException("Failed to write the file.");
        } finally {
            $file->flock(LOCK_UN);
        }
    }

    public function load(): array
    {
        if (!is_readable($this->path))
            return [];

        $file = new \SplFileObject($this->path);
        if ($file->fstat() === false)
            throw new \RuntimeException("File open error.");

        $file->setFlags(\SplFileObject::READ_CSV);

        $commentList = [];
        foreach ($file as $line) {
            if ($file->eof())
                break;

            $comment = Entities\Comment::createFromArray($line);

            // ※ ここでは省いているが、制約を強く効かせられるDBと違って、ファイル経由のデータは想定通りに入っていない可能性がそれなりにある。
            // この箇所でデータチェックをしてあげると安心。具体的なチェックをEntityモデル内に用意するのも良い。

            $commentList[] = $comment;
        }

        return $commentList;
    }
}
