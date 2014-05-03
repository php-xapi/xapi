<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Model;

/**
 * An {@link ActorInterface Actor's} outcome related to the
 * {@link StatementInterface Statement} in which it is included.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface ResultInterface
{
    public function setScore(ScoreInterface $score);

    /**
     * @return ScoreInterface
     */
    public function getScore();

    public function setSuccess($success);

    public function getSuccess();

    /**
     * Sets the completion status.
     *
     * @param boolean $completion True, if the Activity was completed, false
     *                            otherwise
     */
    public function setCompletion($completion);

    /**
     * Returns the completion status.
     *
     * @return boolean $completion True, if the Activity was completed, false
     *                             otherwise
     */
    public function getCompletion();

    /**
     * Sets a response for the given activity.
     *
     * @param string $response The response
     */
    public function setResponse($response);

    /**
     * Returns the response.
     *
     * @return string The response
     */
    public function getResponse();

    /**
     * Sets the period of time over which the Activity was performed.
     *
     * @param string $duration The duration
     */
    public function setDuration($duration);

    /**
     * Returns the period of time over which the Activity was performed.
     *
     * @return string The duration
     */
    public function getDuration();
}
