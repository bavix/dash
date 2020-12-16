<?php

declare(strict_types=1);

namespace App\Services;

use Generator;
use function escapeshellarg;
use function array_combine;
use function array_values;
use function array_map;
use function implode;
use function sprintf;
use function exec;

/**
 * @psalm-immutable
 */
final class SystemdService
{
    /**
     * @psalm-pure
     *
     * @param string[] $apps
     *
     * @psalm-return array<string, bool>
     *
     * @return Generator
     */
    public function checkActivity(array $apps): Generator
    {
        foreach ($this->command('is-active', $apps) as $app => $state) {
            yield $app => $state === 'active';
        }
    }

    /**
     * @psalm-pure
     *
     * @param string[] $apps
     *
     * @return string[]
     */
    public function getNotActiveServiceList(array $apps): array
    {
        $names = [];
        foreach ($this->checkActivity($apps) as $app => $state) {
            if (!$state) {
                $names[] = $app;
            }
        }

        return $names;
    }

    /**
     * @psalm-pure
     *
     * @param string[] $apps
     *
     * @psalm-return array<string, bool>
     *
     * @return Generator
     */
    public function checkEnabled(array $apps): Generator
    {
        foreach ($apps as $app) {
            yield $app => $this->command('is-enabled', [$app]) !== null;
        }
    }

    /**
     * @psalm-pure
     *
     * @param string $options
     * @param string[] $commands
     *
     * @return array<string, string>|null
     */
    public function command(string $options, array $commands): ?array
    {
        $command = sprintf(
            'systemctl %s %s',
            escapeshellarg($options),
            implode(' ', array_map('escapeshellarg', $commands))
        );

        exec($command . ' 2>/dev/null', $output);

        if (count($output) !== count($commands)) {
            return null;
        }

        return array_combine(
            array_values($commands),
            array_values($output),
        );
    }
}
