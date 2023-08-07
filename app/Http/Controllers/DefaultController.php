<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefaultController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function product()
    {
        return view('user.product-details');
    }
}
