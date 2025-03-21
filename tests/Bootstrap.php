<?php

define('CI_ENVIRONMENT', 'testing');

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../app/Config/Paths.php';

$paths = new Config\Paths();
require rtrim($paths->systemDirectory, '/') . '/bootstrap.php';
