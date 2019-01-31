<?php

namespace App\Services\Packages;

use App\Services\Docker;

class GitlabDocker extends Docker
{

    /**
     * @var string
     */
    protected $color = 'is-danger';

    /**
     * @var array
     */
    protected $icon = ['fab', 'gitlab'];

    /**
     * @var string
     */
    protected $title = 'GitLab';

    /**
     * GitlabDocker constructor.
     */
    public function __construct()
    {
        $this->apps = [env('GITLAB_DOCKER_APP', 'gitlab_web_1')];
    }

}
