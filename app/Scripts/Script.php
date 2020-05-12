<?php

namespace App\Scripts;

abstract class Script
{
    public $name;
    public $user;

    public function getScriptContent()
    {
        return file_get_contents(base_path('scripts/' . $this->name . '.sh'));
    }
}
