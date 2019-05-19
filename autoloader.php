<?php
spl_autoload_register(function ($name) {
    $path = BASE_PATH . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $name) . '.php';
    if (is_readable($path))
        require_once $path;
});
