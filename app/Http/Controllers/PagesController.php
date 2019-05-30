<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index () {
        $title = 'Praise Text Alert Program';
        return view('pages.index')->with('title', $title);
    }
}
