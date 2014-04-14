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
interface ScoreInterface
{
    /**
     * Sets the Agent's scaled score (a number between -1 and 1).
     *
     * @param double $scaled The scaled score
     */
    public function setScaled($scaled);

    /**
     * Returns the Agent's scaled score (a number between -1 and 1).
     *
     * @return double The scaled score
     */
    public function getScaled();

    /**
     * Sets the Agent's score.
     *
     * @param double $raw The score
     */
    public function setRaw($raw);

    /**
     * Returns the Agent's score.
     *
     * @return double The score
     */
    public function getRaw();

    /**
     * Sets the lowest possible score.
     *
     * @param double $min The lowest possible score
     */
    public function setMin($min);

    /**
     * Returns the lowest possible score.
     *
     * @return double The lowest possible score
     */
    public function getMin();

    /**
     * Sets the highest possible score.
     *
     * @param double $max The highest possible score
     */
    public function setMax($max);

    /**
     * Returns the highest possible score.
     *
     * @return double The highest possible score
     */
    public function getMax();
}
