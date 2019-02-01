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
     * @param array $options
     */
    public function __construct(array $options)
    {
        $this->apps = [[env('GITLAB_DOCKER_APP', 'gitlab_web_1')]];
        parent::__construct($options);
    }

}
