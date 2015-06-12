<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\LrsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

/**
 * xAPI LRS bundle DI container extension.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class XabbuhLrsExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $processor = new Processor();
        $configuration = new Configuration();
        $config = $processor->processConfiguration($configuration, $configs);
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));

        // load the database driver
        switch ($config['driver']) {
            case 'mongodb':
                $this->loadMongoDbDriver($container, $loader);
                break;
        }

        $loader->load('listener.xml');
        $loader->load('serializer.xml');
    }

    private function loadMongoDbDriver(ContainerBuilder $container, LoaderInterface $loader)
    {
        $loader->load('mongodb.xml');

        $statementObjectManager = $container->getDefinition('xabbuh_lrs.statement_object_manager');
        $statementRepository = $container->getDefinition('xabbuh_lrs.statement_repository');

        if (method_exists('Symfony\Component\DependencyInjection\Definition', 'setFactory')) {
            $statementObjectManager->setFactory(array(new Reference('doctrine_mongodb'), 'getManagerForClass'));
            $statementRepository->setFactory(array(
                new Reference('xabbuh_lrs.statement_object_manager'),
                'getRepository'
            ));
        } else {
            $statementObjectManager->setFactoryService('doctrine_mongodb');
            $statementObjectManager->setFactoryMethod('getManagerForClass');

            $statementRepository->setFactoryService('xabbuh_lrs.statement_object_manager');
            $statementRepository->setFactoryMethod('getRepository');
        }
    }
}
