<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Models\Gallery;
use App\Models\Wedding;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminController extends Controller
{
    public function index(): Response
    {
        $weddings = Wedding::count();
        $storys = Story::count();
        $gallerys = Gallery::count();

        return response()->view('admin.index', [
            'weddings' => $weddings,
            'storys' => $storys,
            'gallerys' => $gallerys,
        ]);
    }
}
