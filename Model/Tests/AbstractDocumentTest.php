<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Model\Tests;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class AbstractDocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testArrayAccessMethods()
    {
        $document = $this->createDocument();

        $this->assertFalse(isset($document['x']));

        $document['x'] = 'foo';

        $this->assertTrue(isset($document['x']));
        $this->assertEquals('foo', $document['x']);

        $document['x'] = 'bar';

        $this->assertEquals('bar', $document['x']);

        unset($document['x']);

        $this->assertFalse(isset($document['x']));
    }

    public function testGetData()
    {
        $document = $this->createDocument();
        $document['x'] = 'foo';
        $document['y'] = 'bar';

        $this->assertEquals(array('x' => 'foo', 'y' => 'bar'), $document->getData());
    }

    /**
     * @return \Xabbuh\XApi\Model\DocumentInterface
     */
    abstract protected function createDocument();
}
