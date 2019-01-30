<?php

if (!\function_exists('systemCtl')) {
    function systemCtl(string $options, string $app): array
    {
        $appName = \json_encode($app);
        \exec("systemctl $options $appName", $output);
        return (array)$output;
    }
}
