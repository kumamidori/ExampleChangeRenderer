<?php

use BEAR\Package\Bootstrap;
use BEAR\Resource\ResourceObject;

require dirname(__DIR__) . '/bin/autoload.php';

/* @global string $context */
if (strpos($_SERVER['REQUEST_URI'], '/api/') !== false) {
    $context = 'app';
}

$app = (new Bootstrap)->getApp('Kumamidori\ExampleChangeRenderer', $context, dirname(__DIR__));
$request = $app->router->match($GLOBALS, $_SERVER);

try {
    $page = $app->resource
        ->{$request->method}
        ->uri($request->path)
        ->withQuery($request->query)
        ->eager
        ->request();
    /* @var $page ResourceObject */
    $page->transfer($app->responder, $_SERVER);
    exit(0);
} catch (\Exception $e) {
    $app->error->handle($e, $request)->transfer();
    exit(1);
}
