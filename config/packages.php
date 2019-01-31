<?php

return [
    \App\Services\Packages\Linux::class => [
        'enable' => env('SERVICE_LINUX_ENABLE', false),
    ],

    \App\Services\Packages\Plex::class => [
        'enable' => env('SERVICE_PLEX_ENABLE', false),
    ],

    \App\Services\Packages\OpenSSH::class => [
        'enable' => env('SERVICE_OPENSSH_ENABLE', false),
    ],

    \App\Services\Packages\Netatalk::class => [
        'enable' => env('SERVICE_NETATALK_ENABLE', false),
    ],

    \App\Services\Packages\NetData::class => [
        'enable' => env('SERVICE_NETDATA_ENABLE', false),
    ],

    \App\Services\Packages\GitlabDocker::class => [
        'enable' => env('SERVICE_GITLAB_DOCKER_ENABLE', false),
    ],

    \App\Services\Packages\Samba::class => [
        'enable' => env('SERVICE_SAMBA_ENABLE', false),
    ],

    \App\Services\Packages\Supervisor::class => [
        'enable' => env('SERVICE_SUPERVISOR_ENABLE', false),
    ],

    \App\Services\Packages\XiaomiPadavan::class => [
        'enable' => env('SERVICE_XIAOMI_PADAVAN_ENABLE', false),
        'address' => env('SERVICE_XIAOMI_PADAVAN_ADDRESS', 'http://192.168.1.1')
    ],
];
