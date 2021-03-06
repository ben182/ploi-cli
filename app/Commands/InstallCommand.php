<?php

namespace App\Commands;

use App\Helper\Bash;
use Illuminate\Console\Scheduling\Schedule;
use LaravelZero\Framework\Commands\Command;
use Illuminate\Support\Facades\Storage;

class InstallCommand extends Command
{
    /**
     * The signature of the command.
     *
     * @var string
     */
    protected $signature = 'install';

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
    public function handle(Bash $bash)
    {
        if (! $bash->command_exist('wp')) {
            shell_exec('curl -k -L -s -S https://raw.github.com/wp-cli/builds/gh-pages/phar/wp-cli.phar > ' . Storage::path('wp-cli.phar'));
            shell_exec('chmod +x ' . Storage::path('wp-cli.phar'));

            shell_exec('ln -s ' . Storage::path('wp-cli.phar') . ' ~/.config/composer/vendor/bin/wp');
        }
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
