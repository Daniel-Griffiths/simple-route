# Simple Route
A super simple router for mapping a url to a method on a class. 

## Installation

Via Composer

```
composer require daniel-griffiths/simple-route
```


## Usage

```PHP
<?php

require __DIR__.'/vendor/autoload.php';

$router = new \DanielGriffiths\Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);

// long form for binding a route, supports get/post requests
$router->add('GET', '/this-is-a-test', 'ExampleClassName@ExampleMethod');

// short hand for binding a route 
$router->get('/this-is-a-test', 'ExampleClassName@ExampleMethod');
$router->post('/this-is-a-test', 'ExampleClassName@ExampleMethod');

$router->dispatch();

```

