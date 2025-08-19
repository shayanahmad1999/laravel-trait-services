<?php

namespace App\Http\Controllers;

use App\Services\SampleService;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public $service;

    public function __construct(SampleService $service)
    {
        $this->service = $service;
    }

    public function getHello()
    {
        return $this->service->sayHello('Shayan');
    }

    public function getCode()
    {
        return $this->service->generateCode(12);
    }
}
