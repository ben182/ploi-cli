<?php

namespace App\Helper;

class Bash
{
    public function command_exist($cmd)
    {
        $return = shell_exec(sprintf("which %s 2>/dev/null", escapeshellarg($cmd)));

        return ! empty($return);
    }
}
