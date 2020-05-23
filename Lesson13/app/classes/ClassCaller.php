<?php

namespace app\classes;

class ClassCaller
{
    static function call()
    {
        $result = static::parseToClassMethod($_SERVER['REQUEST_URI'], '/[A-Za-z\/]{1,}/');

        if($result['fullName'])
        {
            if(class_exists($result['fullName'])){
                $class = new $result['fullName']();
                if(method_exists($class, $result['method'])){
                    $class->{$result['method']}();
                }
                else
                    $class->index();
            }
            else
                header ("HTTP/1.1 404 Not Found");
        }
    }

    static function parseToClassMethod(string $string, string $pattern){
        preg_match_all($pattern, $string, $matches);
        $result = ['name' => '', 'method' => '', 'fullName' => ''];

        if(!$matches[0])
            return $result;

        $values = explode('/', trim(implode($matches[0]),'/'));
        $result['name'] = $values[0];
        $result['fullName'] = __NAMESPACE__ . DIRECTORY_SEPARATOR . $values[0];
        $result['method'] = $values[1];

        return $result;
    }
}