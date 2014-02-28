<?php
if (!file_exists($autoloadFile = __DIR__.'/../vendor/autoload.php')) {
    die('Unable to load vendor/autoload.php. Did you run composer install --dev?'.PHP_EOL);
}

$loader = require $autoloadFile;
$loader->addPsr4('Xabbuh\XApiCommon\Tests\\', __DIR__);

\Doctrine\Common\Annotations\AnnotationRegistry::registerAutoloadNamespace(
    'JMS\Serializer\Annotation',
    __DIR__.'/../vendor/jms/serializer/src'
);
