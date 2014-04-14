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
 * An Experience API {@link https://github.com/adlnet/xAPI-Spec/blob/master/xAPI.md#statement Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface StatementInterface
{
    /**
     * Sets the Statement's unique identifier.
     *
     * @param string $id The identifier
     */
    public function setId($id);

    /**
     * Returns the Statement's unique identifier.
     *
     * @return string The identifier
     */
    public function getId();

    /**
     * Sets the Statement's {@link VerbInterface Verb}.
     *
     * @param \Xabbuh\XApi\Common\Model\VerbInterface $verb The Verb
     */
    public function setVerb(VerbInterface $verb);

    /**
     * Returns the Statement's {@link VerbInterface Verb}.
     *
     * @return \Xabbuh\XApi\Common\Model\VerbInterface The Verb
     */
    public function getVerb();

    /**
     * Sets the Statement's {@link ActorInterface Actor}.
     *
     * @param \Xabbuh\XApi\Common\Model\ActorInterface $actor The Actor
     */
    public function setActor(ActorInterface $actor);

    /**
     * Returns the Statement's {@link ActorInterface Actor}.
     *
     * @return \Xabbuh\XApi\Common\Model\ActorInterface The Actor
     */
    public function getActor();

    /**
     * Sets the Statement's {@link Object}.
     *
     * @param \Xabbuh\XApi\Common\Model\ObjectInterface $object The Object
     */
    public function setObject(ObjectInterface $object);

    /**
     * Returns the Statement's {@link Object}.
     *
     * @return \Xabbuh\XApi\Common\Model\ObjectInterface The Object
     */
    public function getObject();

    /**
     * Sets the {@link ActivityInterface Activity} {@link ResultInterface Result}.
     *
     * @param ResultInterface $result The Result
     */
    public function setResult(ResultInterface $result);

    /**
     * Returns the {@link ActivityInterface Activity} {@link ResultInterface Result}.
     *
     * @return ResultInterface The Result
     */
    public function getResult();

    /**
     * Returns a {@link StatementReferenceInterface  StatementReference} for
     * the Statement.
     *
     * @return StatementReferenceInterface The reference
     */
    public function getStatementReference();

    /**
     * Returns a Statement that voids the current Statement.
     *
     * @param ActorInterface $actor The Actor voiding this Statement
     *
     * @return StatementInterface The voiding Statement
     */
    public function getVoidStatement(ActorInterface $actor);
}
