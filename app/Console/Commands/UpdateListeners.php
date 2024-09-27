<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Radio;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

class UpdateListeners extends Command
{
    protected $signature = 'listeners:update';
    protected $description = 'Update the listeners count for each radio station';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $stations = Radio::all();

        foreach ($stations as $station) {
            $key = 'listeners_' . $station->id;
            $listeners = Cache::get($key, []);

            $timeLimit = Carbon::now()->subHour();

            $activeListeners = array_filter($listeners, function($listener) use ($timeLimit) {
                return isset($listener['last_active']) && Carbon::parse($listener['last_active'])->greaterThan($timeLimit);
            });

            $station->listeners = count($activeListeners);
            $station->save();

            if (count($activeListeners) > 0) {
                Cache::put($key, $activeListeners, now()->addMinutes(10));
            } else {
                Cache::forget($key);
            }
        }

        $this->info('Listeners updated successfully.');
    }
}
