<html>
<?php /* コメント一覧表示と入力フォーム。ロジック部分の例示を目的としたサンプルコードのため質素。 */ ?>

<head>
    <title>Comment List</title>

</head>

<body>
    <h1>Comment List</h1>
    <ul>
        <?php foreach ($list as $val) : ?>
            <li><b><?= htmlspecialchars($val->commenter) ?></b>&nbsp;<?php echo htmlspecialchars($val->contents) ?>&nbsp;(<?php echo htmlspecialchars($val->created) ?>)</li>
        <?php endforeach; ?>
    </ul>

    <hr />

    <form method="POST" action="?p=Post">
        <label>名前：</label>
        <input type="text" size=15 name="commenter" />
        &nbsp;&nbsp;&nbsp;
        <label>コメント：</label>
        <input type="text" size=60 name="contents" />
        <input type="submit" value="送信" />
    </form>

</body>

</html>