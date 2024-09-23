<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Radio;
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

    public function updateListeners(Request $request, $stationId)
    {
        $station = Radio::findOrFail($stationId);

        $key = 'listeners_' . $stationId;
        $currentListeners = \Cache::get($key, 0);

        $uniqueIdentifier = $request->ip();
        $listeners = \Cache::get($key, []);

        if (!in_array($uniqueIdentifier, $listeners)) {
            $listeners[] = $uniqueIdentifier;
            \Cache::put($key, $listeners, now()->addMinutes(10));
        }

        return response()->json([
            'status' => 'success',
            'listeners' => count($listeners),
            'station_id' => $stationId
        ]);
    }
}
