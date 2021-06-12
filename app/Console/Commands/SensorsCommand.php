<?php

namespace App\Console\Commands;

use App\Interfaces\DAgentInterface;
use App\Interfaces\MultiSensorInterface;
use App\Interfaces\SensorInterface;
use Illuminate\Console\Command;
use JetBrains\PhpStorm\ArrayShape;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;

class SensorsCommand extends Command
{
    private array $tags;

    public function __construct(
        private DAgentInterface $clientService,
    ) {
        $this->tags = ['hostname' => gethostname()];
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
        $settings = array_filter(
            config('sensors', []),
            static fn (array $setting) => $setting['enable'] ?? false
        );

        $objects = array_map(
            static fn (array $setting) => app($setting['class'], $setting['options']),
            $settings
        );

        $simpleSensors = [];
        $multiSensors = [];
        foreach ($objects as $object) {
            if ($object instanceof SensorInterface) {
                $simpleSensors[] = $object;
            } elseif ($object instanceof MultiSensorInterface) {
                $multiSensors[] = $object->getSensors();
            }
        }

        $this->clientService->dispatchMessages(
            array_map([$this, 'sensorToArray'], array_merge($simpleSensors, ...$multiSensors))
        );
    }

    #[ArrayShape(['name' => "string", 'tags' => "array", 'value' => "int"])]
    private function sensorToArray(SensorInterface $sensor): array
    {
        return [
            'name' => $sensor->getName(),
            'value' => $sensor->getValue(),
            'tags' => array_merge($this->tags, $sensor->getTags()),
        ];
    }
}
