<?php

namespace App\Controllers;

class Driver extends BaseController
{
    public function index(): string
    {
        return view('driver/dashboard');
    }
    public function requests(): string
    {
        return view('driver/requests');
    }
    public function history(): string
    {
        return view('driver/history');
    }
    public function earnings(): string
    {
        return view('driver/earnings');
    }
    public function profile(): string
    {
        return view('driver/profile');
    }


}
