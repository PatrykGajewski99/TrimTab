<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function read() {

        $data = DB::table('users')->get();
        return view('adminDashboard', ['users' => $data]);
    }
}
