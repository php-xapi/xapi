<?php

/*
 * This file is part of the XabbuhXApiClientBundle package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\ClientBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Extension\Extension;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\DependencyInjection\Reference;

/**
 * XabbuhXApiClientBundle extension.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class XabbuhXApiClientExtension extends Extension
{
    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('client_manager.xml');

        $this->processClients($config['clients'], $container);
    }

    /**
     * {@inheritDoc}
     */
    public function getXsdValidationBasePath()
    {
        return __DIR__.'/../Resources/config/schema';
    }

    /**
     * {@inheritDoc}
     */
    public function getNamespace()
    {
        return 'http://xabbuh.de/schema/dic/xabbuh/xapi-client';
    }

    /**
     * {@inheritDoc}
     */
    public function getAlias()
    {
        return 'xabbuh_xapi_client';
    }

    protected function processClients($clients, ContainerBuilder $container)
    {
        $clientsParameter = array();

        foreach ($clients as $name => $client) {
            $httpClientId = 'xabbuh_xapi_client.http_client.'.$name;
            $httpClientDefinition = new Definition('Guzzle\Http\Client');
            $httpClientDefinition->setPublic(false);
            $container->setDefinition($httpClientId, $httpClientDefinition);

            $id = 'xabbuh_xapi_client.client.'.$name;
            $definition = new Definition(
                'Xabbuh\XApi\Client\XApiClient',
                array(
                    new Reference($httpClientId),
                    new Reference('jms_serializer.serializer'),
                    $client['version']
                )
            );
            $container->setDefinition($id, $definition);

            $clientsParameter[$name] = $id;
        }

        $container->setParameter('xabbuh_xapi_client.clients', $clientsParameter);
    }
}
