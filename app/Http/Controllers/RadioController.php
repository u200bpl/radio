<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Radio;

class RadioController extends Controller
{
    public function index()
    {     
        return view('welcome', [
            'radios' => Radio::orderBy('name')->paginate(16),
        ]);
    }
}
