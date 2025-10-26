<?php

namespace App\Controllers;

class Rider extends BaseController
{
    public function index(): string
    {
        return view('rider/dashboard');
    }
}
