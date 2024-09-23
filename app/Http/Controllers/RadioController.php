<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Radio;
use App\Models\RadioStation;
use Carbon\Carbon;

class RadioController extends Controller
{
    public function index()
    {     
        return view('welcome', [
            'radios' => Radio::orderBy('name')->paginate(16),
            'featuredRadio' => Radio::where('featured', true)->first(),
            'popularRadios' => Radio::orderBy('listeners', 'desc')->take(5)->get()
        ]);
    }
}
