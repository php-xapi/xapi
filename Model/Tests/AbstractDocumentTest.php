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

use Xabbuh\XApi\DataFixtures\DocumentFixtures;
use Xabbuh\XApi\Model\Document;
use Xabbuh\XApi\Model\DocumentData;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class AbstractDocumentTest extends \PHPUnit_Framework_TestCase
{
    public function testReadyOnlyArrayAccessMethods()
    {
        $data = DocumentFixtures::getEmptyDocumentData();
        $document = $this->createDocument($data);

        $this->assertFalse(isset($document['x']));

        $data = DocumentFixtures::getDocumentData();
        $document = $this->createDocument($data);

        $this->assertTrue(isset($document['x']));
        $this->assertEquals('foo', $document['x']);
        $this->assertTrue(isset($document['y']));
        $this->assertEquals('bar', $document['y']);
    }

    /**
     * @expectedException \Xabbuh\XApi\Common\Exception\UnsupportedOperationException
     */
    public function testSettingDataThrowsException()
    {
        $data = DocumentFixtures::getEmptyDocumentData();
        $document = $this->createDocument($data);
        $document['x'] = 'bar';
    }

    /**
     * @expectedException \Xabbuh\XApi\Common\Exception\UnsupportedOperationException
     */
    public function testRemovingDataThrowsException()
    {
        $data = DocumentFixtures::getDocumentData();
        $document = $this->createDocument($data);
        unset($document['x']);
    }

    public function testGetData()
    {
        $data = DocumentFixtures::getDocumentData();
        $document = $this->createDocument($data);

        $this->assertSame($data, $document->getData());
    }

    /**
     * @param DocumentData $data
     *
     * @return Document
     */
    abstract protected function createDocument(DocumentData $data);
}
