<?php

namespace App\Commands;

use App\Api;
use App\Command;
use App\Scripts\AddWpCliScript;

class AddAllScripts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'scripts:add';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(Api $api)
    {
        /** @var \App\Scripts\Script $script */

        foreach ($this->getAllScripts() as $script) {
            $script   = new $script;
            $response = $api->createScript($script->name, $script->getScriptContent(), $script->user);
        }
    }

    protected function getAllScripts()
    {
        return [
            AddWpCliScript::class,
        ];
    }
}
