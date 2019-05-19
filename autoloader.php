<?php
spl_autoload_register(function ($name) {
    $path = BASE_PATH . '/' . $name . '.php';
    if (is_readable($path))
        require_once $path;
});
