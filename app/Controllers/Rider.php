<?php

namespace App\Controllers;

class Rider extends BaseController
{
    public function index(): string
    {
        return view('rider/dashboard');
    }
    public function rides(): string
    {
        return view('rider/rides');
    }
    public function book(): string
    {
        return view('rider/book');
    }
    public function payments(): string
    {
        return view('rider/payments');
    }
    public function profile(): string
    {
        return view('rider/profile');
    }
}
