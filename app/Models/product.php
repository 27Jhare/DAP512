<?php
namespace Tables;

class Product
{
    public int $id;
    public string $name;
    //needs to be string to insert properly
    public $price;
    public string $description;
    public string $image;
    //stop cretaion of non properties from
    //https://stackoverflow.com/questions/9136464/how-to-avoid-dynamic-properties-in-php-raise-an-error-when-setting-an-undeclare
    public function __set($name, $value)
    {
        switch ($name) {
            default:
                // we don't allow any magic properties set or overwriting our properties
                try {
                    $error = "Assignment of {$name} in " . static::class . ' not allowed because it is a magic variable or read-only property.';
                    throw new \RuntimeException($error);
                } catch (\RuntimeException $e) { }

        }
    }

    public function __get($name)
    {
        switch ($name) {
            default:
                // we don't allow any magic properties
                try {
                    $error = "var {$name} is not a property of " . static::class . '.';
                    throw new \RuntimeException($error);
                } catch (\RuntimeException $e) {  }
        }
        return null;
    }

    public function __isset($name)
    {
        switch ($name) {
            default:
                return false;
        }
    }
}
