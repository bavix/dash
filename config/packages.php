<?php

return [
    \App\Services\Packages\Linux::class => env('SERVICE_LINUX_ENABLE', false),
    \App\Services\Packages\Plex::class => env('SERVICE_PLEX_ENABLE', false),
    \App\Services\Packages\OpenSSH::class => env('SERVICE_OPENSSH_ENABLE', false),
    \App\Services\Packages\Netatalk::class => env('SERVICE_NETATALK_ENABLE', false),
    \App\Services\Packages\NetData::class => env('SERVICE_NETDATA_ENABLE', false),
    \App\Services\Packages\GitlabDocker::class => env('SERVICE_GITLAB_DOCKER_ENABLE', false),
];
