<?php

namespace App\Commands;

use App\Api;
use App\Command;
use Illuminate\Console\Scheduling\Schedule;

class TestCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'test';

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
    public function handle(Api $api)
    {
        // $response = $api->createScript('wp-cli', "#!/bin/bash\n\ncurl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar\nchmod +x wp-cli.phar\nsudo mv wp-cli.phar /usr/local/bin/wp", 'root');

        dd($api->listScripts());
        

        // $api->runScript();
        // dd($response);
        // $this->anticipate('Which server?', );
        // dd($api->getServer());
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
