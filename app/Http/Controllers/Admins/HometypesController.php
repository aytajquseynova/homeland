<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use App\Models\Prop\HomeType;
use Illuminate\Http\Request;

class HometypesController extends Controller
{
    public function allHomeTypes()
    {
        $hometypes = HomeType::select()->get();
        return view('admins.hometypes', compact('hometypes'));
    }

    public function createHomeTypes()
    {
        return view('admins.createhometypes');
    }

    public function storeHomeTypes(Request $request)
    {
        $request->validate([
            'hometypes' => 'required|string|max:255',
        ]);
        $storeHometypes = HomeType::create([
            'hometypes' => $request->input('hometypes'),

        ]);

        if ($storeHometypes) {
            return redirect()->route('admins.hometypes')->with('success', 'Admin added successfully');
        }
    }


    //  edit and update
    public function editHomeTypes($id)

    {

        $hometype = HomeType::find($id);

        return view('admins.edithometypes', compact('hometype'));
    }

    public function updateHomeTypes(Request $request, $id)
    {
        $request->validate([
            'hometypes' => 'required|string|max:255',
        ]);

        $singleHomeType = HomeType::find($id);

        if (!$singleHomeType) {
            return redirect()->route('admins.hometypes')->with('error', 'Home type not found');
        }


        $singleHomeType->update([
            'hometypes' => $request->input('hometypes'),
        ]);

        return redirect()->route('admins.hometypes')->with('success', 'Home type updated successfully');
    }

    //  delete hometype

    public function deleteHomeTypes($id)

    {
        $hometype = HomeType::find($id);
        $hometype->delete();

        if ($hometype) {
            return redirect()->route('admins.hometypes')->with('delete', 'Home type deleted successfully');
        }
    }


    
}
