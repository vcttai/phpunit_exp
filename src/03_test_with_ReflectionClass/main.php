<?php
declare(strict_types=1);

require_once (__DIR__ . '/../../vendor/autoload.php');

use exp\src\TestReflectionClass\LicenseWithPrivateMethods;

$private_license_checker = new LicenseWithPrivateMethods();
var_dump($private_license_checker->applyForLicense(7, 'John'));
var_dump($private_license_checker->applyForLicense(4, 'Anna'));
