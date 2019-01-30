<?php

if (!\function_exists('getPackages')) {
    function getPackages(): array
    {
        $filter = \array_filter(\config('packages', []));
        return \array_keys($filter);
    }
}
