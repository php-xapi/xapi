<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\ClientBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Compiler pass adding all configured xAPI clients to the xAPI client manager.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class RegisterClientsPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('xabbuh_xapi_client.client_manager');

        $clients = array();

        foreach ($container->getParameter('xabbuh_xapi_client.clients') as $name => $id) {
            $clients[$name] = new Reference($id);
        }

        $definition->setArguments(array($clients));
    }
}
