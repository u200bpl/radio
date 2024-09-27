<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Radio;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

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
        $currentStationId = $request->session()->get('current_station_id'); 
        $uniqueIdentifier = $request->ip();

        if ($currentStationId && $currentStationId != $stationId) {
            $oldKey = 'listeners_' . $currentStationId;
            $oldListeners = \Cache::get($oldKey, []);

            if (($key = array_search($uniqueIdentifier, array_column($oldListeners, 'ip'))) !== false) {
                unset($oldListeners[$key]);
                if (count($oldListeners) > 0) {
                    \Cache::put($oldKey, array_values($oldListeners), now()->addMinutes(10));
                } else {
                    \Cache::forget($oldKey);
                }
            }
        }

        $request->session()->put('current_station_id', $stationId);

        $key = 'listeners_' . $stationId;
        $listeners = \Cache::get($key, []);

        $currentTime = now();
        if (!in_array($uniqueIdentifier, array_column($listeners, 'ip'))) {
            $listeners[] = [
                'ip' => $uniqueIdentifier,
                'last_active' => $currentTime
            ];
            \Cache::put($key, $listeners, now()->addMinutes(10));
        }

        return response()->json([
            'status' => 'success',
            'listeners' => count($listeners),
            'station_id' => $stationId
        ]);
    }
}
