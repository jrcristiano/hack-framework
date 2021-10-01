<?php

namespace Dark\Oculus;

class View
{
    public function __construct($page, $params)
    {
        $template = $params['template'] ?? 'layouts\\app';
        
        $params['title'] = $params['title'] ?? null;
        $params['data'] = $params['data'] ?? [];

        if ($this->fileExists($page) && $this->fileExists($template)) {
            $data = $params['data'];
            $page = __DIR__."\\..\\..\\resources\\views\\{$page}.oculus.php";
            include_once __DIR__."\\..\\..\\resources\\views\\{$template}.oculus.php";
        }   
    }

    private function fileExists(string $file)
    {
        $file = __DIR__."\\..\\..\\resources\\views\\{$file}.oculus.php";
        return file_exists($file);
    }
}
