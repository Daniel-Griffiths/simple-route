# Simple Route
A super simple router for mapping a url to a method on a class. 

## Installation

Via Composer

```
composer require daniel-griffiths/simple-route dev-master
```


## Usage

```PHP
<?php

require __DIR__.'/vendor/autoload.php';

$router = new \DanielGriffiths\Router($_SERVER['REQUEST_METHOD'], $_SERVER['REQUEST_URI']);
$router->get('/this-is-a-test', 'ExampleClassName@ExampleMethod');
$router->dispatch();

```

