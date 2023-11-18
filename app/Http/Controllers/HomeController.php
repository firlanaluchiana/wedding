<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function index(): Response
    {
        // dd($weddings = Wedding::all());
        return response()->view('home.index', [
            'weddings' => Wedding::all()
        ]);
    }
}