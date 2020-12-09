<?php

namespace App\Units;

use App\DTO\StateDTO;
use Illuminate\Support\Facades\Http;

class XiaomiMI3G extends Router
{
    protected function configureStateDTO(StateDTO $stateDTO): StateDTO
    {
        return parent::configureStateDTO($stateDTO)
            ->setTitle('Xiaomi')
            ->setColor('is-info');
    }

    /**
     * @return void
     */
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
