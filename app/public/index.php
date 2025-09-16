<?php

use App\Kernel;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel(
        is_string($context['APP_ENV']) ? $context['APP_ENV'] : '',
        (bool) $context['APP_DEBUG']
    );
};
