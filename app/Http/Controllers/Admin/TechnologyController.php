<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    //
    public function index () {
        $technologies = Technology::all();

        return view('admin.technologies.index', compact('technologies'));
    }
}