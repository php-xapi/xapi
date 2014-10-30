<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Model;

/**
 * The outcome of an {@link Activity} achieved by an {@link Agent}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Score
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
     * Sets the Agent's scaled score (a number between -1 and 1).
     *
     * @param double $scaled The scaled score
     */
    public function setScaled($scaled)
    {
        $this->scaled = $scaled;
    }

    /**
     * Returns the Agent's scaled score (a number between -1 and 1).
     *
     * @return double The scaled score
     */
    public function getScaled()
    {
        return $this->scaled;
    }

    /**
     * Sets the Agent's score.
     *
     * @param double $raw The score
     */
    public function setRaw($raw)
    {
        $this->raw = $raw;
    }

    /**
     * Returns the Agent's score.
     *
     * @return double The score
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * Sets the lowest possible score.
     *
     * @param double $min The lowest possible score
     */
    public function setMin($min)
    {
        $this->min = $min;
    }

    /**
     * Returns the lowest possible score.
     *
     * @return double The lowest possible score
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Sets the highest possible score.
     *
     * @param double $max The highest possible score
     */
    public function setMax($max)
    {
        $this->max = $max;
    }

    /**
     * Returns the highest possible score.
     *
     * @return double The highest possible score
     */
    public function getMax()
    {
        return $this->max;
    }
}
