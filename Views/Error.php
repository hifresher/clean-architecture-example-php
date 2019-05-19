<html>
<?php /* エラー表示 */ ?>

<head>
    <title>Error</title>

</head>

<body>
    <h1>Error</h1>
    <p>Please contact the system administrator.</p>
    <dl>
        <dt>Message</dt>
        <dd><?= htmlspecialchars($e->getMessage()) ?></dd>
    </dl>
</body>

</html>