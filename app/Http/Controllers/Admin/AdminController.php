<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //Dashboard
    public function admin() {
    	return view('admin.admin');//admin.dashboard
    }
}
