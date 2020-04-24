<?php
declare(strict_types=1);

require_once (__DIR__ . '/HelloPHPUnit.php');
use exp\src\HelloPHPUnit;

$hello = new HelloPHPUnit();
var_dump($hello->sayHello());
