<?php

namespace App;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class Api
{
    public function getServer()
    {
        $response = $this->getHttp()->get('https://ploi.io/api/servers');

        return collect($response->json()['data']);
    }

    public function createScript($label, $content, $user = 'ploi')
    {
        $response = $this->getHttp()->post('https://ploi.io/api/scripts', [
            'label'   => $label,
            'content' => $content,
            'user'    => $user,
        ]);

        return collect($response->json()['data']);
    }

    public function listScripts()
    {
        $response = $this->getHttp()->get('https://ploi.io/api/scripts/');

        return collect($response->json()['data']);
    }

    public function getScript(string $scriptId)
    {
        $response = $this->getHttp()->get('https://ploi.io/api/scripts/'. $scriptId);

        return collect($response->json()['data']);
    }

    public function runScript(string $scriptId, $servers)
    {
        $response = $this->getHttp()->post('https://ploi.io/api/scripts/'. $scriptId . '/run', [
            'servers' => Arr::wrap($servers),
        ]);

        return collect($response->json()['data']);
    }

    protected function getApiKey()
    {
        return app('valuestore')->get('apiKey');
    }

    protected function getHttp()
    {
        return Http::withToken($this->getApiKey())->withHeaders([
            'Accept'       => 'application/json',
            'Content-Type' => 'application/json',
        ]);
    }
}
