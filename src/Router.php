<?php

namespace DanielGriffiths;

/**
 * Router - A super simple router class
 * 
 * @package Router
 * @author Daniel Griffiths (daniel-griffiths)
 */
class Router
{
    /**
     * Route storage.
     * 
     * @var array
     */
    protected $routes = [];

    /**
     * Request method (eg GET, POST).
     * 
     * @var string
     */
    protected $method;

    /**
     * Request URI.
     * 
     * @var string
     */
    protected $uri;

    /**
     * Create a new Router
     * 
     * @param string $method 
     * @param string $uri    
     */
    public function __construct($method, $uri)
    {
        $this->method = $method;
        $this->uri = $uri;
    }

    /**
     * Register a new route.
     * 
     * @param string $method  
     * @param string $uri     
     * @param string $handler
     * @return array 
     */
    public function add($method, $uri, $handler)
    {
        return $this->routes[$method][$uri] = explode('@', $handler);
    }

    /**
     * Alias to register a new GET route.
     * 
     * @param string $uri     
     * @param string $handler 
     * @return array
     */
    public function get($uri, $handler)
    {
        return $this->add('GET', $uri, $handler);
    }

    /**
     * Alias to register a new POST route.
     * 
     * @param string $uri     
     * @param string $handler
     * @return array 
     */
    public function post($uri, $handler)
    {
        return $this->add('POST', $uri, $handler);
    }

    /**
     * Dispatch the router.
     * 
     * @return mixed
     */
    public function dispatch()
    {
        return (new $this->routes[$this->method][$this->uri][0])->{$this->routes[$this->method][$this->uri][1]}();
    }

    /**
     * Return an array of all registered routes.
     * 
     * @return array
     */
    public function getRoutes()
    {
        return $this->routes;
    }
}
