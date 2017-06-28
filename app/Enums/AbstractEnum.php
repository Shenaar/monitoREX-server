<?php

namespace App\Enums;

abstract class AbstractEnum
{

    public static function getAll()
    {
        $class = new \ReflectionClass(get_called_class());

        return $class->getConstants();
    }

}
