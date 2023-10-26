<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test() {
        $users = User::all();
        return view('test', compact('users'));
    }
    public function omoi() {
        return view('omoi');
    }
    public function gaibu() {
        return view('gaibu');
    }
    public function form() {
        return view('form');
    }
    public function timeout() {
        return view('timeout');
    }
    public function deep() {
        return view('deep');
    }
}
