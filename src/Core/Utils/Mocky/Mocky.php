<?php

namespace Core\Utils\Mocky;

class Mocky {
    public static function create($class): MockySet {
        if (!is_subclass_of($class, Mockable::class))
            throw new \InvalidArgumentException("class must be mockable.");

        $instance = new $class;
        $instance->mock();
        
        return $instance->data();
    }
}