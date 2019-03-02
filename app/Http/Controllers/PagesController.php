<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function index()
    {
        $title = '';
        //return view('pages.index', compact('title'));
        return view('pages.index');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function prices()
    {
        return view('pages.prices');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
