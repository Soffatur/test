<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function product($id){
        dd($id);
    }

    public function reviews(){
        dd('reviews');
    }
}
