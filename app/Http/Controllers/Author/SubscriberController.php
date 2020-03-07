<?php

namespace App\Http\Controllers\Author;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use App\Subscriber;

class SubscriberController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email'=>"required|unique:subscribers"
        ]);

        $subscribers = new Subscriber();
        $subscribers->email = $request->email;
        $subscribers->save();

        
        Toastr::success('Your Successfully added to our subscriber list','Success');
        return redirect()->back();
    }
}
