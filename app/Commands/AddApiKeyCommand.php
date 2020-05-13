<?php

namespace App\Commands;

use App\Command;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Storage;

class AddApiKeyCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'apikey:create';

    /**
     * The description of the command.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $apiKey = $this->secret('What is your ploi API key?');

        // app('valuestore')->put('apiKey', $apiKey);
        Storage::put('config.json', json_encode([
            'key' => $apiKey,
        ]));
    }

    /**
     * Define the command's schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    public function schedule(Schedule $schedule): void
    {
        // $schedule->command(static::class)->everyMinute();
    }
}
