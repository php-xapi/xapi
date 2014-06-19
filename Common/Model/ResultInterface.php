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
    /**
     * Sets the score the user achieved.
     *
     * @param ScoreInterface $score The score
     */
    public function setScore(ScoreInterface $score);

    /**
     * Returns the user's score.
     *
     * @return ScoreInterface The score
     */
    public function getScore();

    /**
     * Sets whether or not the user finished a task successfully.
     *
     * @param boolean $success True if the user finished an exercise successfully,
     *                         false otherwise
     */
    public function setSuccess($success);

    /**
     * Returns whether or not the user finished a task successfully.
     *
     * @return boolean True if the user finished an exercise successfully,
     *                 false otherwise
     */
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
