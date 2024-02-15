<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Prop\AllRequest;
use App\Models\Prop\SavedProp;
use Illuminate\Support\Facades\Auth;;

class UsersController extends Controller
{
    public function allRequests()
    {
        if (auth()->user()) {
            $allRequests = AllRequest::where('user_id', Auth::user()->id)->get();

            return view('users.displayrequests', compact('allRequests'));
        }else{
            return abort('404');
        }
    }

    public function allSavedProps()
    {
        if (auth()->user()) {
        $allSavedProps = SavedProp::where('user_id', Auth::user()->id)->get();

        return view('users.displaysavedprops', compact('allSavedProps'));
        } else {
            return abort('404');
        }
    }
}
