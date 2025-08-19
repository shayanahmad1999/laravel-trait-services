<?php

namespace App\Http\Controllers;

use App\Trait\SampleTrait;
use Illuminate\Http\Request;

class TraitController extends Controller
{
    use SampleTrait;

    public function getHello()
    {
        return $this->sayHello('Shayan');
    }

    public function getCode()
    {
        return $this->generateCode(12);
    }
}
