<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\RadioStation;

class ReduceListeners extends Command
{
    // De naam en beschrijving van het command
    protected $signature = 'listeners:reduce';
    protected $description = 'Reduce listeners count for all radio stations';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Haal alle radiostations op
        $stations = RadioStation::all();

        foreach ($stations as $station) {
            // Verminder het aantal luisteraars, bijvoorbeeld met 10%
            $newListenerCount = max(0, $station->listeners - intval($station->listeners * 0.10));
            $station->listeners = $newListenerCount;
            $station->save();
        }

        $this->info('Listeners count reduced for all stations.');
    }
}