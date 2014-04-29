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

use Xabbuh\XApi\Common\Model\Score;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ScoreTest extends ModelTest
{
    public function testDeserialize()
    {
        /** @var \Xabbuh\XApi\Common\Model\ScoreInterface $score */
        $score = $this->deserialize($this->loadFixture('score'));

        $this->assertEquals(0.62, $score->getScaled());
        $this->assertEquals(31, $score->getRaw());
        $this->assertEquals(0, $score->getMin());
        $this->assertEquals(50, $score->getMax());
    }

    public function testSerialize()
    {
        $score = new Score();
        $score->setScaled(0.62);
        $score->setRaw(31);
        $score->setMin(0);
        $score->setMax(50);

        $this->serializeAndValidateData($this->loadFixture('score'), $score);
    }
}
