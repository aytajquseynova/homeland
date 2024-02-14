<?php

namespace App\Http\Controllers;

use App\Models\Prop\Property;
use Illuminate\Http\Request;

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
        $props = Property::all();
        return view('home', compact('props'));
    }

    public function contact(){
        return view('pages.contact');
    }

    public function about()
    {
        return view('pages.about');
    }
}
