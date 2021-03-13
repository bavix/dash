<?php

namespace App\Units;

use Illuminate\Support\Facades\Http;

class PadavanRouter extends Router
{
    public function restartEvent(): void
    {
        abort_if(!$this->getStateDTO()->isRestartAllowed(), 400);

        Http::timeout(5)
            ->baseUrl($this->url)
            ->retry(3, 100)
            ->withBasicAuth($this->username, $this->password)
            ->asForm()
            ->withHeaders(['X-Requested-With' => 'XMLHttpRequest'])
            ->post('/apply.cgi', ['action_mode' => ' Reboot ']);
    }
}
