<?php
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

require_once "vendor/autoload.php";

$isDevMode = true;
$config = Setup::createAnnotationMetadataConfiguration(array(__DIR__."/Entity"), $isDevMode);

$configdb = new \Doctrine\DBAL\Configuration();
// the connection configuration
$dbParams = array(
    'driver'   => 'pdo_pgsql',
    'user'     => 'postgres',
    'password' => 'root',
    'dbname'   => 'test',
    'host' => 'localhost',
    'port'=> 5432
);

$conn = \Doctrine\DBAL\DriverManager::getConnection($dbParams, $configdb);
$entityManager = EntityManager::create($dbParams, $config);
//return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);

//vendor/bin/doctrine orm:info инфо
