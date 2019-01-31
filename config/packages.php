<?php

return [
    \App\Services\Packages\Linux::class => env('SERVICE_LINUX_ENABLE', false),
    \App\Services\Packages\GitlabDocker::class => env('SERVICE_GITLAB_DOCKER_ENABLE', false),
];
