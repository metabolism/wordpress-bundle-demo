<?php

use App\CacheKernel;
use App\Kernel;

require_once dirname(__DIR__).'/vendor/autoload_runtime.php';

return function (array $context) {

    $kernel = new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);

    $is_logged_in = strpos(serialize($_COOKIE), 'logged_in') !== false;
    $is_dev = $context['APP_ENV'] != 'prod' || $context['APP_DEBUG'];

    if( (!$is_dev && !$is_logged_in) || 'PURGE' === ($_SERVER['REQUEST_METHOD']??'GET') )
        $kernel = new CacheKernel($kernel);

    return $kernel;
};
