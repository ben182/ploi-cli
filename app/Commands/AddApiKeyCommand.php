<?php

namespace App\Commands;

use App\Command;
use App\Helper\Config;
use Illuminate\Console\Scheduling\Schedule;

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
    public function handle(Config $config)
    {
        $apiKey = $this->secret('What is your ploi API key?');

        $config->set('apiKey', $apiKey);
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
