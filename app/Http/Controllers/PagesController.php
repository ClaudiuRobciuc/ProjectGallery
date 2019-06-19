<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use App\PaintingModel;

class PagesController extends Controller
{
    //
    public function index()
    {
        $products = PaintingModel::whereNull('sold_at')->get();
        return view('pages.index',[
            'products' => $products,
        ]);
    }

    public function about()
    {
        return view('pages.about');
    }

    public function shop()
    {
        return view('pages.shoppingcart');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function contact()
    {
        return view('pages.contact');
    }
    

}
