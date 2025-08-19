<?php

namespace App\Trait;

use Illuminate\Support\Str;

trait SampleTrait
{
    public function sayHello(string $name)
    {
        return "Hello {$name}! Welcome to Laravel.";
    }

    public function generateCode(int $code)
    {
        return Str::random($code);
    }
}
