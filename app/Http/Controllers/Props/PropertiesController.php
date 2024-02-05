<?php

namespace App\Http\Controllers\Props;

use App\Http\Controllers\Controller;
use App\Models\Prop\Property;
use Illuminate\Http\Request;


class PropertiesController extends Controller
{
    public function index(){
        $props = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
        // dd($props);
        return view('home', compact('props'));
    }

    public function single($id){
        $singleProp = Property::find($id);
        $props = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
        return view('props.single', compact('singleProp', 'props'));
    }
}
