<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\LRSBundle\Tests\DependencyInjection;

use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractExtensionTestCase;
use Symfony\Component\DependencyInjection\Reference;
use Xabbuh\XApi\Bundle\LrsBundle\DependencyInjection\XabbuhLrsExtension;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class XabbuhLrsExtensionTest extends AbstractExtensionTestCase
{
    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testStorageDriverIsRequired()
    {
        $this->load();

        $this->validateContainerBuilder();
    }

    public function testMongoDBStorageDriver()
    {
        $this->load(array('driver' => 'mongodb'));

        $this->validateContainerBuilder();
        $this->assertContainerBuilderHasService(
            'xabbuh_lrs.statement_manager',
            'Xabbuh\XApi\Storage\MongoDB\Manager\StatementManager'
        );
        $this->assertContainerBuilderHasServiceDefinitionWithArgument(
            'xabbuh_lrs.statement_manager',
            0,
            new Reference('xabbuh_lrs.statement_object_manager')
        );
        $this->assertContainerBuilderHasService('xabbuh_lrs.statement_object_manager');
    }

    protected function getContainerExtensions()
    {
        return array(new XabbuhLrsExtension());
    }

    private function validateContainerBuilder()
    {
        $this->validateSerializers();
        $this->validateControllers();
    }

    private function validateSerializers()
    {
        $serializers = array(
            'xabbuh_lrs.actor_serializer' => 'Xabbuh\XApi\Common\Serializer\ActorSerializer',
            'xabbuh_lrs.document_serializer' => 'Xabbuh\XApi\Common\Serializer\DocumentSerializer',
            'xabbuh_lrs.statement_result_serializer' => 'Xabbuh\XApi\Common\Serializer\StatementResultSerializer',
            'xabbuh_lrs.statement_serializer' => 'Xabbuh\XApi\Common\Serializer\StatementSerializer',
        );

        foreach ($serializers as $id => $class) {
            $this->assertContainerBuilderHasService(
                $id,
                $class
            );
            $this->assertContainerBuilderHasServiceDefinitionWithArgument(
                $id,
                0,
                new Reference('jms_serializer')
            );
        }
    }

    private function validateControllers()
    {
        $this->assertContainerBuilderHasService(
            'xabbuh_lrs.statements_controller',
            'Xabbuh\XApi\Bundle\LrsBundle\Controller\StatementsController'
        );
        $this->assertContainerBuilderHasServiceDefinitionWithArgument(
            'xabbuh_lrs.statements_controller',
            0,
            new Reference('xabbuh_lrs.statement_manager')
        );
        $this->assertContainerBuilderHasServiceDefinitionWithArgument(
            'xabbuh_lrs.statements_controller',
            1,
            new Reference('xabbuh_lrs.statement_serializer')
        );
    }
}
