<?php
namespace syhcode\tpTransformer;

use syhcode\tpTransformer\Response\Factory;

trait Helpers
{
    public function response(){
        return app(Factory::class);
    }


    public function __get($name)
    {
        // TODO: Implement __get() method.
        $callable = [
          'response'
        ];
        if (in_array($name, $callable) && method_exists($this, $name)) {
            return $this->$name();
        }

        throw new \think\Exception('未定义属性 '.get_class($this).'::'.$name, 500);
    }
}