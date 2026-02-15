<?php 
namespace Core ;
// class use to  store routes but to implement a Router, i use class Dispatcher  
class Route
{
    
    private static $routes=[];
    private $routeIndex;
  

    private static function addRoute($method,$uri,$controller)
    {
        static::$routes[]=[
            "method"=>$method,
            "uri"=>$uri,
            "controller"=>$controller,
            "middlewares"=>[]

        ];
        return array_key_last(static::$routes);
    }
      private function __construct($index)
    {
        $this->routeIndex=$index;
       
    }
    public function only($key)
    {
      static::$routes[$this->routeIndex]['middlewares'][] = $key;
        return $this;
    }
     public static function get($uri,$controller)
    {
       $index= static::addRoute('GET',$uri,$controller);
       return new static($index);

    }
    public static function post($uri,$controller)
    {
         $index= static::addRoute('POST',$uri,$controller);
         return new static($index);


    }
    public static function put($uri,$controller)
    {
        $index=static::addRoute('PUT',$uri,$controller);
        return new static($index);


    }
    public static function delete($uri,$controller)
    {
       $index=static::addRoute('DELETE',$uri,$controller);
       return new static($index);


    }
    public static function patch($uri,$controller)
    {
         $index=static::addRoute('PATCH',$uri,$controller);
         return new static($index);


    }
    // this function use to return array  to routes becuse $routes is private
    public static function routes()
    {
        
        return static::$routes;
    }

}

