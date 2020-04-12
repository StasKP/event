<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index ()
    {
        if (auth()->user()->is_admin != 1) {
            return view('admin/no_admin');
        }
        return view('admin/home');
    }
}
