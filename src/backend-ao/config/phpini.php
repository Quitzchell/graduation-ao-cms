<?php

/*
 * This config file allows you to set specific PHP INI values for the application through ENV variables.
 * This file is read by the AppServiceProvider during booting. The values are therefor applied to the entire application.
 */

return [
    // Matching the memory limit with the limit in the kubernetes config
    //    'memory_limit' => env('PHP_INI_MEMORY_LIMIT', '128M'),
];
