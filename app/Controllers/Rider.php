<?php

namespace App\Controllers;

class Rider extends BaseController
{
    public function index(): string
    {
        $locationModel = new \App\Models\Location_model();
        $data['locations'] = $locationModel->findAll();
        return view('rider/dashboard', $data);
    }
    public function rides(): string
    {
        return view('rider/rides');
    }
    public function book(): string
    {
        $locationModel = new \App\Models\Location_model();
        $data['locations'] = $locationModel->findAll();
        return view('rider/book', $data);
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
