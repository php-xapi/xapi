<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Tests\Model;

use Xabbuh\XApi\Common\Model\Result;
use Xabbuh\XApi\Common\Model\Score;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ResultTest extends ModelTest
{
    public function testDeserialize()
    {
        /** @var \Xabbuh\XApi\Common\Model\ResultInterface $result */
        $result = $this->deserialize($this->loadFixture('result'));

        $this->assertEquals(0.95, $result->getScore()->getScaled(), '', 0.01);
        $this->assertTrue($result->getSuccess());
        $this->assertTrue($result->getCompletion());
    }

    public function testSerialize()
    {
        $score = new Score();
        $score->setScaled(0.95);
        $result = new Result();
        $result->setScore($score);
        $result->setSuccess(true);
        $result->setCompletion(true);

        $this->serializeAndValidateData(
            $this->loadFixture('result'),
            $result
        );
    }
}
