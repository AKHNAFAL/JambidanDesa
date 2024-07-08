<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SDGsController extends Controller
{
    public function index()
    {

        return view('sdgs', compact(''));
    }
}
