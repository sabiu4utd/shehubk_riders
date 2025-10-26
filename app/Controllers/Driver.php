<?php

namespace App\Controllers;

class Driver extends BaseController
{
    public function index(): string
    {
        return view('driver/dashboard');
    }
}
