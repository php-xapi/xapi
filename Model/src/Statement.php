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
 * An Experience API {@link https://github.com/adlnet/xAPI-Spec/blob/master/xAPI.md#statement Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Statement
{
    /**
     * @var string The unique identifier
     */
    protected $id;

    /**
     * @var Verb $verb The {@link Verb}
     */
    protected $verb;

    /**
     * @var Actor The {@link Actor}
     */
    protected $actor;

    /**
     * @var Object The {@link Object}
     */
    protected $object;

    /**
     * @var Result The {@link Activity} {@link Result}
     */
    protected $result;

    /**
     * Sets the Statement's unique identifier.
     *
     * @param string $id The identifier
     */
    public function setId($id)
    {
        $this->id = $id;
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
     * Sets the Statement's {@link Verb}.
     *
     * @param Verb $verb The Verb
     */
    public function setVerb(Verb $verb)
    {
        $this->verb = $verb;
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
     * Sets the Statement's {@link Actor}.
     *
     * @param Actor $actor The Actor
     */
    public function setActor(Actor $actor)
    {
        $this->actor = $actor;
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
     * Sets the Statement's {@link Object}.
     *
     * @param Object $object The Object
     */
    public function setObject(Object $object)
    {
        $this->object = $object;
    }

    /**
     * Returns the Statement's {@link Object}.
     *
     * @return Object The Object
     */
    public function getObject()
    {
        return $this->object;
    }

    /**
     * Sets the {@link Activity} {@link Result}.
     *
     * @param Result $result The Result
     */
    public function setResult(Result $result)
    {
        $this->result = $result;
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
     * Returns a {@link StatementReference} for the Statement.
     *
     * @return StatementReference The reference
     */
    public function getStatementReference()
    {
        $reference = new StatementReference();
        $reference->setStatementId($this->id);

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
        $voidStatement = new Statement();
        $voidStatement->setActor($actor);
        $voidStatement->setVerb(Verb::createVoidVerb());
        $statementReference = new StatementReference();
        $statementReference->setStatementId($this->id);
        $voidStatement->setObject($statementReference);

        return $voidStatement;
    }
}
