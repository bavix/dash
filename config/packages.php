<?php

return [

    \App\Services\Packages\Linux::class => [
        'enable' => env('SERVICE_LINUX_ENABLE', false),
    ],

    \App\Services\Packages\Supervisor::class => [
        'enable' => env('SERVICE_SUPERVISOR_ENABLE', false),
    ],

    \App\Services\Packages\XiaomiPadavan::class => [
        'enable' => env('SERVICE_XIAOMI_PADAVAN_ENABLE', false),
        'url' => env('SERVICE_XIAOMI_PADAVAN_URL', 'http://192.168.1.1'),
    ],

    \App\Services\Packages\ZyxelKeenetic::class => [
        'enable' => env('SERVICE_ZYXEL_KEENETIC_ENABLE', false),
        'url' => env('SERVICE_ZYXEL_KEENETIC_URL', 'http://192.168.1.1'),
    ],

    \App\Services\Packages\Plex::class => [
        'enable' => env('SERVICE_PLEX_ENABLE', false),
        'url' => env('SERVICE_PLEX_URL', 'http://127.0.0.1:32400'),
    ],

    \App\Services\Packages\Netatalk::class => [
        'enable' => env('SERVICE_NETATALK_ENABLE', false),
    ],

    \App\Services\Packages\Samba::class => [
        'enable' => env('SERVICE_SAMBA_ENABLE', false),
    ],

    \App\Services\Packages\Transmission::class => [
        'enable' => env('SERVICE_TRANSMISSION_ENABLE', false),
        'url' => env('SERVICE_TRANSMISSION_URL', 'http://127.0.0.1:9091'),
    ],

    \App\Services\Packages\GitlabDocker::class => [
        'enable' => env('SERVICE_GITLAB_DOCKER_ENABLE', false),
        'url' => env('SERVICE_GITLAB_DOCKER_URL', 'http://127.0.0.1:8080'),
    ],

    \App\Services\Packages\NetData::class => [
        'enable' => env('SERVICE_NETDATA_ENABLE', false),
    ],

    \App\Services\Packages\TeamViewer::class => [
        'enable' => env('SERVICE_TEAMVIEWER_ENABLE', false),
    ],

    \App\Services\Packages\OpenSSH::class => [
        'enable' => env('SERVICE_OPENSSH_ENABLE', false),
    ],

];
