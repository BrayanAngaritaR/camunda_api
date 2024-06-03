<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckAdmissionProcess extends Controller
{
    public function index()
    {
        return view('panel.index');
    }

    public function documents()
    {
        return view('panel.documents');
    }

}
