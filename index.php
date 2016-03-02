<?php
include_once('config/config.php');
include_once('config/repositories.php');
include_once('classes/object.php');
include_once('classes/deploy.php');

$deployer = new Deployer($repositories);
$deployer->deploy();

echo 'ok';