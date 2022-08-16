<?php

namespace App\Http\Controllers;

use App\Models\Show;
use Illuminate\Http\Request;

class FrontendCtrl extends Controller
{

    public function index()
    {
        $shows= Show::paginate();
        return view('welcome', compact('shows'));
    }

    public function show(Show $show) {
        return view('view', compact('show'));
    }
}
