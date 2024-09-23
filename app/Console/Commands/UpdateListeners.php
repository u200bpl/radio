<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RadioStation;
use Illuminate\Support\Facades\Cache;

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
        $stations = RadioStation::all();

        foreach ($stations as $station) {
            $key = 'listeners_' . $station->id;
            $listeners = Cache::get($key, []);

            $station->listeners = count($listeners);
            $station->save();

            Cache::forget($key);
        }

        $this->info('Listeners updated successfully.');
    }
}