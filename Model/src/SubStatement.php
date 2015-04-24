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
 * A {@link Statement} included as part of a parent Statement.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
final class SubStatement extends Object
{
    /**
     * @var string The unique identifier
     */
    private $id;

    /**
     * @var Verb $verb The {@link Verb}
     */
    private $verb;

    /**
     * @var Actor The {@link Actor}
     */
    private $actor;

    /**
     * @var Object The {@link Object}
     */
    private $object;

    /**
     * @var Result The {@link Activity} {@link Result}
     */
    private $result;

    public function __construct($id, Actor $actor, Verb $verb, Object $object, Result $result = null)
    {
        $this->id = $id;
        $this->actor = $actor;
        $this->verb = $verb;
        $this->object = $object;
        $this->result = $result;
    }

    /**
     * Returns the Statement's unique identifier.
     *
     * @return string The identifier
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the Statement's {@link Verb}.
     *
     * @return Verb The Verb
     */
    public function getVerb()
    {
        return $this->verb;
    }

    /**
     * Returns the Statement's {@link Actor}.
     *
     * @return Actor The Actor
     */
    public function getActor()
    {
        return $this->actor;
    }

    /**
     * Returns the Statement's {@link Object}.
     *
     * @return \Xabbuh\XApi\Model\Object The Object
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Returns the {@link Activity} {@link Result}.
     *
     * @return Result The Result
     */
    public function getResult()
    {
        return $this->result;
    }

    /**
     * Tests whether or not this Statement is a void Statement (i.e. it voids
     * another Statement).
     *
     * @return bool True if the Statement voids another Statement, false otherwise
     */
    public function isVoidStatement()
    {
        return $this->verb->isVoidVerb();
    }

    /**
     * Returns a {@link StatementReference} for the Statement.
     *
     * @return StatementReference The reference
     */
    public function getStatementReference()
    {
        $reference = new StatementReference($this->id);

        return $reference;
    }

    /**
     * Returns a Statement that voids the current Statement.
     *
     * @param Actor $actor The Actor voiding this Statement
     *
     * @return Statement The voiding Statement
     */
    public function getVoidStatement(Actor $actor)
    {
        return new Statement(
            null,
            $actor,
            Verb::createVoidVerb(),
            $this->getStatementReference()
        );
    }

    /**
     * {@inheritdoc}
     */
    public function equals(Object $statement)
    {
        if ('Xabbuh\XApi\Model\SubStatement' !== get_class($statement)) {
            return false;
        }

        /** @var SubStatement $statement */

        if ($this->id !== $statement->id) {
            return false;
        }

        if (!$this->actor->equals($statement->actor)) {
            return false;
        }

        if (!$this->verb->equals($statement->verb)) {
            return false;
        }

        if (!$this->object->equals($statement->object)) {
            return false;
        }

        if (null === $this->result && null !== $statement->result) {
            return false;
        }

        if (null !== $this->result && null === $statement->result) {
            return false;
        }

        if (null !== $this->result && !$this->result->equals($statement->result)) {
            return false;
        }

        return true;
    }
}
