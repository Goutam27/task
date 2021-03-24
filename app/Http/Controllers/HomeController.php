<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Category;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function admin_dashboard() 
    {
    // $parentCategories = \App\Category::where('parent_id',0)->get();
    // return view('admin_dashboard', compact('parentCategories'));

        $categories = Category::where('parent_id', '=', 0)->get();
        $allCategories = Category::all();//dd($allCategories);
        return view('admin_dashboard',compact('categories','allCategories'));

    }
}
