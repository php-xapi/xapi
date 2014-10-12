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
use Xabbuh\XApi\Serializer\Serializer;

/**
 * Compiler pass adding Serializer metadata for the xAPI model classes.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class RegisterSerializerMetadataPass implements CompilerPassInterface
{
    /**
     * {@inheritDoc}
     */
    public function process(ContainerBuilder $container)
    {
        $fileLocator = $container->findDefinition('jms_serializer.metadata.file_locator');
        $dirs = $fileLocator->getArgument(0);
        $dirs['Xabbuh\XApi\Model'] = Serializer::getMetadataDirectory();
        $fileLocator->replaceArgument(0, $dirs);
    }
}
