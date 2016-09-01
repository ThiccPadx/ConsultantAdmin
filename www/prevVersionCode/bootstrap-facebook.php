<?php
spl_autoload_register(function($className) {
    $path = __DIR__ . "/lib/" . str_replace("\\", "/", $className) . '.php';
    if (file_exists($path)) {
        echo $path . "<br>";
        require $path;
        return true;
    }
    return false;
});
