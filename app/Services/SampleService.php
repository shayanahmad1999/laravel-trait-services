<?php

namespace App\Services;

use Illuminate\Support\Str;

class SampleService
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function sayHello(string $name)
    {
        return "Hello {$name}! Welcome to Laravel.";
    }

    public function generateCode($code)
    {
        return Str::random($code);
    }
}
