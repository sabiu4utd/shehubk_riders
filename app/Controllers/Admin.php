<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(): string
    {
        return view('admin/dashboard');
    }
    public function users(): string
    {
        return view('admin/users');
    }
    public function rides(): string
    {
        return view('admin/rides');
    }
}
