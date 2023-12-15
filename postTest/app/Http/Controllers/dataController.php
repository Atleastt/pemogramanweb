<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dataController extends Controller
{
    public function show(){
        return view('home');
    }

    public function submit(Request $request){
        $data = $request->all();
        return view('dashboardAdmin',$data);
    }
}
