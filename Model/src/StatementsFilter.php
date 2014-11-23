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
 * Filter to apply on GET requests to the statements API.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class StatementsFilter
{
    /**
     * @var array The generated filter
     */
    private $filter = array();

    /**
     * Filters by an Agent or an identified Group.
     *
     * @param Actor $actor The Actor to filter by
     *
     * @return self The statements filter
     *
     * @throws \InvalidArgumentException if the Actor is not identified
     */
    public function byActor(Actor $actor)
    {
        if (null === $actor->getInverseFunctionalIdentifier()) {
            throw new \InvalidArgumentException('Actor must be identified');
        }

        $this->filter['agent'] = $actor;

        return $this;
    }

    /**
     * Filters by a verb.
     *
     * @param Verb $verb The Verb to filter by
     *
     * @return self The statements filter
     */
    public function byVerb(Verb $verb)
    {
        $this->filter['verb'] = $verb->getId();

        return $this;
    }

    /**
     * Filter by an Activity.
     *
     * @param Activity $activity The Activity to filter by
     *
     * @return self The statements filter
     */
    public function byActivity(Activity $activity)
    {
        $this->filter['activity'] = $activity->getId();

        return $this;
    }

    /**
     * Filters for Statements matching the given registration id.
     *
     * @param string $registration A registration id
     *
     * @return self The statements filter
     */
    public function byRegistration($registration)
    {
        $this->filter['registration'] = $registration;
    }

    /**
     * Applies the Activity filter to Sub-Statements.
     *
     * @return self The statements filter
     */
    public function enableRelatedActivityFilter()
    {
        $this->filter['related_activities'] = true;
    }

    /**
     * Don't apply the Activity filter to Sub-Statements.
     *
     * @return self The statements filter
     */
    public function disableRelatedActivityFilter()
    {
        $this->filter['related_activities'] = false;
    }

    /**
     * Applies the Agent filter to Sub-Statements.
     *
     * @return self The statements filter
     */
    public function enableRelatedAgentFilter()
    {
        $this->filter['related_agents'] = true;
    }

    /**
     * Don't apply the Agent filter to Sub-Statements.
     *
     * @return self The statements filter
     */
    public function disableRelatedAgentFilter()
    {
        $this->filter['related_agents'] = false;
    }

    /**
     * Filters for Statements stored since the specified timestamp (exclusive).
     *
     * @param \DateTime $timestamp The timestamp
     *
     * @return self The statements filter
     */
    public function since(\DateTime $timestamp)
    {
        $this->filter['since'] = $timestamp->format('c');

        return $this;
    }

    /**
     * Filters for Statements stored at or before the specified timestamp.
     *
     * @param \DateTime $timestamp The timestamp as a unix timestamp
     *
     * @return self The statements filter
     */
    public function until(\DateTime $timestamp)
    {
        $this->filter['until'] = $timestamp->format('c');

        return $this;
    }

    /**
     * Sets the maximum number of Statements to return. The server side sets
     * the maximum number of results when this value is not set or when it is 0.
     *
     * @param int $limit Maximum number of Statements to return
     *
     * @return self The statements filter
     *
     * @throws \InvalidArgumentException if the limit is not a non-negative
     *                                   integer
     */
    public function limit($limit)
    {
        if ($limit < 0) {
            throw new \InvalidArgumentException('Limit must be a non-negative integer');
        }

        $this->filter['limit'] = $limit;

        return $this;
    }

    /**
     * Specifies the format of the StatementResult being returned.
     *
     * "ids": Includes only information for the Agent, Activity and Group
     * needed to identify them.
     *
     * "exact": Agents, Groups and Activities will be returned as they were when
     * the Statements where received by the LRS.
     *
     * "canonical": For objects containing language maps, only the most appropriate
     * language will be returned. Agent objects will be returned as if the "exact"
     * format was given.
     *
     * @param string $format A valid format identifier (one of "ids", "exact"
     *                       or "canonical"
     *
     * @return self The statements filter
     *
     * @throws \InvalidArgumentException if no valid format is given
     */
    public function format($format)
    {
        if (!in_array($format, array('ids', 'exact', 'canonical'))) {
            throw new \InvalidArgumentException('Unknown format '.$format.' given');
        }

        $this->filter['format'] = $format;
    }

    /**
     * Query attachments for each Statement being returned.
     *
     * @return self The statements filter
     */
    public function includeAttachments()
    {
        $this->filter['attachments'] = true;
    }

    /**
     * Don't query for Statement attachments (the default behavior).
     *
     * @return self The statements filter
     */
    public function excludeAttachments()
    {
        $this->filter['attachments'] = false;
    }

    /**
     * Return statements in ascending order of stored time.
     *
     * @return self The statements filter
     */
    public function ascending()
    {
        $this->filter['ascending'] = 'True';

        return $this;
    }

    /**
     *Return statements in descending order of stored time (the default behavior).
     *
     * @return self The statements filter
     */
    public function descending()
    {
        $this->filter['ascending'] = 'False';

        return $this;
    }

    /**
     * Returns the generated filter.
     *
     * @return array The filter
     */
    public function getFilter()
    {
        return $this->filter;
    }
}
