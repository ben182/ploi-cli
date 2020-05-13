<?php

namespace App\Helper;

class Bash
{
    public function command_exist($cmd)
    {
        $return = shell_exec(sprintf("command -v %s", escapeshellarg($cmd)));

        return ! empty($return);
    }
}
