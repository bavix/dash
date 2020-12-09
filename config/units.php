<?php

use App\Units\Aria2;
use App\Units\Beanstalkd;
use App\Units\Grafana;
use App\Units\Linux;
use App\Units\Netatalk;
use App\Units\NetData;
use App\Units\Nginx;
use App\Units\OpenSSH;
use App\Units\Plex;
use App\Units\PostgreSQL;
use App\Units\Samba;
use App\Units\Supervisor;
use App\Units\TeamViewer;
use App\Units\Tor;
use App\Units\XiaomiMI3G;

return [
    'linux' => [
        'class' => Linux::class,
        'enable' => env('SERVICE_LINUX_ENABLE', false),
        'options' => [],
    ],
    'supervisor' => [
        'class' => Supervisor::class,
        'enable' => env('SERVICE_SUPERVISOR_ENABLE', false),
        'options' => [],
    ],
    'xiaomi_mi3g' => [
        'class' => XiaomiMI3G::class,
        'enable' => env('SERVICE_XIAOMI_MI3G_ENABLE', false),
        'options' => [
            'url' => env('SERVICE_XIAOMI_MI3G_URL', 'http://192.168.1.1'),
            'username' => env('SERVICE_XIAOMI_MI3G_USERNAME', 'admin'),
            'password' => env('SERVICE_XIAOMI_MI3G_PASSWORD', 'admin'),
        ],
    ],
    'tor_server' => [
        'class' => Tor::class,
        'enable' => env('SERVICE_TOR_ENABLE', false),
        'options' => [],
    ],
    'plex_media_server' => [
        'class' => Plex::class,
        'enable' => env('SERVICE_PLEX_ENABLE', false),
        'options' => [
            'url' => env('SERVICE_PLEX_URL', 'http://127.0.0.1:32400'),
        ],
    ],
    'grafana' => [
        'class' => Grafana::class,
        'enable' => env('SERVICE_GRAFANA_ENABLE', false),
        'options' => [
            'url' => env('SERVICE_GRAFANA_URL', 'http://127.0.0.1:3000'),
        ],
    ],
    'aria2' => [
        'class' => Aria2::class,
        'enable' => env('SERVICE_ARIA2_ENABLE', false),
        'options' => [
            'url' => env('SERVICE_ARIA2_URL'),
        ],
    ],
    'pgsql' => [
        'class' => PostgreSQL::class,
        'enable' => env('SERVICE_POSTGRES_ENABLE', false),
        'options' => [],
    ],
    'nginx' => [
        'class' => Nginx::class,
        'enable' => env('SERVICE_NGINX_ENABLE', false),
        'options' => [],
    ],
    'netatalk' => [
        'class' => Netatalk::class,
        'enable' => env('SERVICE_NETATALK_ENABLE', false),
        'options' => [],
    ],
    'samba' => [
        'class' => Samba::class,
        'enable' => env('SERVICE_SAMBA_ENABLE', false),
        'options' => [],
    ],
    'netdata' => [
        'class' => NetData::class,
        'enable' => env('SERVICE_NETDATA_ENABLE', false),
        'options' => [
            'url' => env('SERVICE_NETDATA_URL', 'http://127.0.0.1:19999'),
        ],
    ],
    'beanstalkd' => [
        'class' => Beanstalkd::class,
        'enable' => env('SERVICE_BEANSTALKD_ENABLE', false),
        'options' => [],
    ],
    'teamviewer' => [
        'class' => TeamViewer::class,
        'enable' => env('SERVICE_TEAMVIEWER_ENABLE', false),
        'options' => [],
    ],
    'openssh' => [
        'class' => OpenSSH::class,
        'enable' => env('SERVICE_OPENSSH_ENABLE', false),
        'options' => [],
    ],
];
