<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Admin\Admin;
use App\Models\Prop\HomeType;
use App\Models\Prop\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AdminStoreRequest;
use App\Models\Prop\AllRequest;
use App\Models\Prop\PropImage;
use Illuminate\Support\Facades\File;

class AdminsController extends Controller
{

    public function index()
    {
        $props_count = Property::select()->count();
        $home_types_count = HomeType::select()->count();
        $adminsCount = Admin::select()->count();

        return view('admins.index', compact('props_count', 'home_types_count', 'adminsCount'));
    }
    public function viewLogin()
    {
        return view('admins.login');
    }

    public function checkLogin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input('email'), 'password' => $request->input('password')], $remember_me)) {
            return redirect()->route('admins.dashboard');
        } else {
            return redirect()->back()->with(['error' => 'Error logging in']);
        }
    }

    public function allAdmins()
    {
        $allAdmins = Admin::all();
        return view('admins.admins', compact('allAdmins'));
    }

    public function createAdmins()
    {

        return view('admins.create');
    }



    public function storeAdmins(AdminStoreRequest $request)
    {
        $storeAdmins = Admin::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        if ($storeAdmins) {
            return redirect()->route('admins.display')->with('success', 'Admin added successfully');
        }
    }

    public function allRequests()
    {
        $requests = AllRequest::all();
        return view('admins.requests', compact('requests'));
    }

    public function allProps()
    {
        $props = Property::all();
        return view('admins.props', compact('props'));
    }

    public function createProps()
    {

        return view('admins.createprops');
    }

    public function storeProps(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'image' => 'required',
            'beds' => 'required|string|max:255',
            'baths' => 'required|string|max:255',
            'sq_ft' => 'required|string|max:255',
            'year_built' => 'required|string|max:255',
            'price_sqft' => 'required|string|max:255',
            'more_info' => 'string|max:255',
            'location' => 'required|string|max:255',
            'agent_name' => 'required|string|max:255',
            'type' => 'required|string|max:255',
            'city'
            => 'required|string|max:255',
        ]);

        $destinationPath = 'assets/images/';
        $myimage = $request->image->getClientOriginalName();
        $request->image->move(public_path($destinationPath), $myimage);


        $storeProps = Property::create([
            'title' => $request->title,
            'price' => $request->price,
            'image' => $myimage,
            'beds' => $request->beds,
            'baths' => $request->baths,
            'sq_ft' => $request->sq_ft,
            'year_built' => $request->year_built,
            'price_sqft' => $request->price_sqft,
            'more_info' => $request->more_info,
            'location' => $request->location,
            'agent_name' => $request->agent_name,
            'type' => $request->type,
            'city' => $request->city,


        ]);

        if ($storeProps) {
            return redirect()->route('admins.allProps')->with('success', 'Props added successfully');
        }
    }


    //  create gallery
    public function createGallery()
    {

        $allProps = Property::all();
        return view('admins.creategallery', compact('allProps'));
    }



    public function storeGallery(Request $request)
    {
        $files = [];
        if ($request->hasfile('image')) {
            foreach ($request->file('image') as $file) {
                $path = "assets/images_gallery/";
                $name = time() . rand(1, 50) . '.' . $file->extension();
                $file->move(public_path($path), $name);
                $files[] = $name;

                PropImage::create([
                    'image' => $name,
                    'prop_id' => $request->prop_id,
                ]);
            }
        }

        if (!empty($files)) {
            return redirect()->route('admins.allProps')->with('success_gallery', 'Gallery images are successfully uploaded');
        } else {
            return redirect()->route('admins.allProps')->with('error_gallery', 'No images uploaded');
        }
    }


    public function deleteProps($id)
    {

        $deleteProp = Property::find($id);
        if (File::exists(public_path('assets/images/' . $deleteProp->image))) {
            File::delete(public_path('assets/images/' . $deleteProp->image));
        } else {
            //dd('File does not exists.');
        }
        $deleteProp->delete();


        $deleteGallery = PropImage::where('prop_id', 'id')->get();

        foreach ($deleteGallery as $delete) {
            if (File::exists(public_path('assets/images_gallery/' . $delete->image))) {
                File::delete(public_path('assets/images_gallery/' . $delete->image));
            } else {
                //dd('File does not exists.');
            }

            $deleteGallery->delete();
        }

        if ($deleteProp) {
            return redirect()->route('admins.allProps')->with('delete', 'Property deleted successfully');
        } else {
            return redirect()->route('admins.allProps')->with('error_delete', 'Error deleting property');
        }
    }
}
