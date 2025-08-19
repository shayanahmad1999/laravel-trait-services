<?php

namespace App\Trait;

trait SampleTrait
{
    public function sayHello(string $name)
    {
        return "Hello {$name}! Welcome to Laravel.";
    }
}
