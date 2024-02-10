<?php

namespace App\Http\Controllers\Props;

use App\Http\Controllers\Controller;
use App\Models\Prop\AllRequest;
use App\Models\Prop\Property;
use App\Models\Prop\PropImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertiesController extends Controller
{
    public function index()
    {
        $props = Property::select()->take(9)->orderBy('created_at', 'desc')->get();
        // dd($props);
        return view('home', compact('props'));
    }

    public function single($id)
    {
        $singleProp = Property::find($id);
        $propImages = PropImage::where('prop_id', $id)->get();
        $props = Property::select()->take(9)->orderBy('created_at', 'desc')->get();

        // related props

        $relatedProps = Property::where('home_type', $singleProp->home_type)
            ->where('id', '!=', $id)
            ->take(3)
            ->orderBy('created_at', 'desc')
            ->get();

        // validating form request

        $validateFormCount = AllRequest::where('prop_id', $id)
            ->where('user_id', Auth::user()->id)
            ->count();


        return view('props.single', compact('singleProp', 'props', 'propImages', 'relatedProps', 'validateFormCount'));
    }

    public function insertRequests(Request $request)
    {

        $request->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|max:70',
            'phone' => 'required|max:50',
        ], [
            'name.required' => 'The name field is required.',
            'name.max' => 'The name field must not exceed 40 characters.',
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'email.max' => 'The email field must not exceed 70 characters.',
            'phone.required' => 'The phone field is required.',
            'phone.max' => 'The phone field must not exceed 50 characters.',
        ]);


        $insertRequest = AllRequest::create([
            'user_id' => Auth::user()->id,
            'prop_id' => $request->prop_id,
            'agent_name' => $request->agent_name,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        if ($insertRequest) {
            return redirect('/props/prop-details/' . $request->prop_id . '')->with('success', 'Request added successfully');
        }

        echo 'request is completed';
    }
}
