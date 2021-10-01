<?php

use Dark\Oculus\View;

function view(string $page, array $params) {
    return (new View($page, [
        'title' => $params['title'],
        'data' => $params['data'],
        'template' => $params['template'] ?? null
    ]));
}
