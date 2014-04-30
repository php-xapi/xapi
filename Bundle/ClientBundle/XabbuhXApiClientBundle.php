<?php

/*
 * This file is part of the XabbuhXApiClientBundle package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\ClientBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Xabbuh\XApi\Bundle\ClientBundle\DependencyInjection\Compiler\RegisterClientsPass;
use Xabbuh\XApi\Bundle\ClientBundle\DependencyInjection\Compiler\RegisterSerializerMetadataPass;
use Xabbuh\XApi\Bundle\ClientBundle\DependencyInjection\XabbuhXApiClientExtension;

/**
 * Experience API client bundle.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class XabbuhXApiClientBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function build(ContainerBuilder $container)
    {
        $container->addCompilerPass(new RegisterClientsPass());
        $container->addCompilerPass(new RegisterSerializerMetadataPass());
    }

    /**
     * {@inheritDoc}
     */
    public function getContainerExtension()
    {
        if (null === $this->extension) {
            $this->extension = new XabbuhXApiClientExtension();
        }

        return $this->extension;
    }
}
