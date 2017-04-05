<?php

namespace App\Http\Controllers\Admin;


class PagesController extends Controller
{

    public function index()
    {
        return view('admin.index');
    }
}