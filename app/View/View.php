<?php

namespace app\View;

class View
{
    private static string $path;
    private static ?array $data;
    public static function view(string $path, array $data = []): string
    {
        self::$data = $data;
        self::$path = $_SERVER['DOCUMENT_ROOT'] . '/resources/views/' . str_replace('.', '/', $path) . '.php';
        return self::getContent();
    }

    public static function getContent(): string
    {
        extract(self::$data);

        ob_start();
        include self::$path;

        $html = ob_get_contents();
        ob_end_clean();

        return $html;
    }
}