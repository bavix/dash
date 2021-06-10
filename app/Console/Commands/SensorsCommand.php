<?php

namespace App\Console\Commands;

use App\Interfaces\SensorInterface;
use App\Sensors\RandomTinyint;
use App\Services\DAgentClientService;
use Illuminate\Console\Command;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class SensorsCommand extends Command
{
    private array $sensors = [
        RandomTinyint::class,
    ];

    public function __construct(private DAgentClientService $clientService)
    {
        parent::__construct();
    }

    public function getName(): string
    {
        return 'service:sensors';
    }

    public function getDescription(): string
    {
        return __('Adds sensors to dagent');
    }

    /**
     * @throws ClientExceptionInterface
     * @throws JsonException
     */
    public function handle(): void
    {
        $sensors = array_map(static fn (string $name): SensorInterface => app($name), $this->sensors);
        $bundle = array_map(static fn (SensorInterface $sensor) => $sensor->asArray(), $sensors);

        $this->clientService->dispatchMessages($bundle);
    }
}
