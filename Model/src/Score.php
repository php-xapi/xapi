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
final class Score
{
    /**
     * @var float The scaled score (a number between -1 and 1)
     */
    private $scaled;

    /**
     * @var float The Agent's score (a number between min and max)
     */
    private $raw;

    /**
     * @var float The minimum score being possible
     */
    private $min;

    /**
     * @var float The maximum score being possible
     */
    private $max;

    /**
     * @param float $scaled
     * @param float $raw
     * @param float $min
     * @param float $max
     */
    public function __construct($scaled, $raw, $min, $max)
    {
        $this->scaled = (float) $scaled;
        $this->raw = (float) $raw;
        $this->min = (float) $min;
        $this->max = (float) $max;
    }

    /**
     * Returns the Agent's scaled score (a number between -1 and 1).
     *
     * @return float The scaled score
     */
    public function getScaled()
    {
        return $this->scaled;
    }

    /**
     * Returns the Agent's score.
     *
     * @return float The score
     */
    public function getRaw()
    {
        return $this->raw;
    }

    /**
     * Returns the lowest possible score.
     *
     * @return float The lowest possible score
     */
    public function getMin()
    {
        return $this->min;
    }

    /**
     * Returns the highest possible score.
     *
     * @return float The highest possible score
     */
    public function getMax()
    {
        return $this->max;
    }

    /**
     * Checks if another score is equal.
     *
     * Two scores are equal if and only if all of their properties are equal.
     *
     * @param Score $score The score to compare with
     *
     * @return bool True if the scores are equal, false otherwise
     */
    public function equals(Score $score)
    {
        if ($this->scaled !== $score->scaled) {
            return false;
        }

        if ($this->raw !== $score->raw) {
            return false;
        }

        if ($this->min !== $score->min) {
            return false;
        }

        if ($this->max !== $score->max) {
            return false;
        }

        return true;
    }
}
