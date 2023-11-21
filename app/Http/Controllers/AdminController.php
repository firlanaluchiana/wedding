<?php

namespace App\Http\Controllers;

use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function index(): Response
    {
        $weddings = Wedding::count();
        return response()->view('admin.index', compact('weddings'));
    }
}
