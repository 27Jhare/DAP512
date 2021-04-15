<?php
namespace Tables;

class User {

    public string $firstname;
    public  string $lastname;
    public int $id;
    //should be enum
    public string $gender;
    public string $password;
    public string $dob;
    public string $title;
    public string $level;
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


?>