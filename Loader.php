<?php

class ClassLoader
{
    public static function autoload($className)
    {
        $filename = __DIR__ . '/' . $className . '.php';
        if (file_exists($filename)) {
            include $filename;
        }
    }
}
