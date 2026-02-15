<?php
namespace Core;
use App\Middleware\AuthMiddleware;

class Dispatcher
{
    protected static Container $container;

    public static function setContainer(Container $container)
    {
        static::$container = $container;
    }

    public static function dispatch()
    {
        $method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];
        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

        foreach (Route::routes() as $route) {

            if ($route['method'] !== strtoupper($method)) {
                continue;
            }

            if (strpos($route['uri'], '{') === false) {
                if ($route['uri'] === $uri) {
                    foreach($route['middlewares'] as $middleware)
                        {
                            $clasname=middlewareClass($middleware);

                            if(!class_exists($clasname))
                                {
                                    throw new \Exception("Middleware class not found: $clasname");
                                }
                            // $instance = new $clasname ;
                            // $instance->handle();
                            $instance=static::$container->resolve($clasname);
                            $instance->handle();
                            
                        }
                    self::run($route['controller'], []);
                    return;
                }
            } else {
                $regex = '#^' . preg_replace('#\{(\w+)\}#', '(?<$1>[^/]+)', $route['uri']) . '$#';
                if (preg_match($regex, $uri, $matches)) {
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                    foreach($route['middlewares'] as $middleware)
                        {
                            $classname=$middleware;

                            $instance=static::$container->resolve($classname);
                            $instance->handle();
                        }
                    self::run($route['controller'], $params);
                    return;
                }
            }
        }

        abort();
    }

    protected static function run($action, $params)
    {
        [$controllerClass, $method] = $action;

        $controller = static::$container->resolve($controllerClass);

        call_user_func_array([$controller, $method], $params);
    }
}
