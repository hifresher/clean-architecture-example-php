<?php
/*
 * テスト
 * コマンドラインで実行する。コマンド例: php ./TestAll.php
 * 
 * ※ 今回は他のライブラリを使わない方針のためフルスクラッチで書いているが、本来既存のテスト用ライブラリを使う方がよい。
 */
namespace Tests;

use Repositories;
use UseCases;
use Entities;

require_once '../config.php';
require_once '../autoloader.php';

// ↓↓↓ 以下テスト ↓↓↓

// CommentService
$stubRepository = new StubCommentRepository();
$commentService = new UseCases\CommentService($stubRepository);
$commentService->add('commenter1', 'comment1');
$commentService->add('commenter2', 'comment2');

$list = $commentService->getList();

assert(count($list) == 2, 'コメント追加数が異なる');
assert($list[0]->commenter == 'commenter1', 'クラス追加ミス');
assert($list[0]->contents == 'comment1', 'クラス追加ミス');
assert($list[0]->created != null, '日付追加漏れ');

// LocalFileCommentRepository
$filename = 'test.dat';
$testFileName = DATA_PATH . $filename;
if(file_exists($testFileName))
    unlink($testFileName);

$LocalFileCommentRepository = new Repositories\LocalFileCommentRepository($filename);

$time1 = date("Y/m/d H:i:s", mktime(1, 2, 3, 4, 5, 2019));
$comment1 = new Entities\Comment();
$comment1->commenter = 'rcommenter1';
$comment1->contents = 'rcomment1';
$comment1->created = $time1;

$time2 = date("Y/m/d H:i:s", mktime(1, 2, 3, 4, 5, 2020));
$comment2 = new Entities\Comment();
$comment2->commenter = 'rcommenter2';
$comment2->contents = 'rcomment2';
$comment2->created = $time2;

$LocalFileCommentRepository->add($comment1);
$LocalFileCommentRepository->add($comment2);

$list = $LocalFileCommentRepository->load();

assert(count($list) == 2, 'コメント追加数が異なる');
assert($list[0]->commenter == 'rcommenter1', 'クラス追加ミス');
assert($list[0]->contents == 'rcomment1', 'クラス追加ミス');
assert($list[0]->created == $time1, '日付追加漏れ');
assert($list[1]->commenter == 'rcommenter2', 'クラス追加ミス');
assert($list[1]->contents == 'rcomment2', 'クラス追加ミス');
assert($list[1]->created == $time2, '日付追加漏れ');


// テスト後のクリーニング
if(file_exists($testFileName))
    unlink($testFileName);

echo 'Complete.';
