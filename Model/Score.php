<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Model;

/**
 * The outcome of an {@link ActivityInterface Activity} achieved by an
 * {@link AgentInterface Agent}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Score implements ScoreInterface
{
    /**
     * @var double The scaled score (a number between -1 and 1)
     */
    protected $scaled;

    /**
     * @var double The Agent's score (a number between min and max)
     */
    protected $raw;

    /**
     * @var double The minimum score being possible
     */
    protected $min;

    /**
     * @var double The maximum score being possible
     */
    protected $max;

    /**
     * {@inheritDoc}
     */
    public function setScaled($scaled)
    {
        $this->scaled = $scaled;
    }

    /**
     * {@inheritDoc}
     */
    public function getScaled()
    {
        return $this->scaled;
    }

    /**
     * {@inheritDoc}
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;
    }

    /**
     * {@inheritDoc}
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * {@inheritDoc}
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

    /**
     * {@inheritDoc}
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * {@inheritDoc}
     */
    public function setMax($max)
    {
        $this->max = $max;
    }

    /**
     * {@inheritDoc}
     */
    public function getMax()
    {
        return $this->max;
    }
}
