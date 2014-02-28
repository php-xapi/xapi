<?php

/*
 * This file is part of the XabbuhXApiCommon package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApiCommon\Model;

use JMS\Serializer\Annotation as JMS;

/**
 * The verb in a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class Verb implements VerbInterface
{
    /**
     * Reference to the verb definition
     * @var string
     * @JMS\Type("string")
     */
    protected $id;

    /**
     * Human readable representation of the verb in one or more languages
     * @var array
     * @JMS\Type("array<string,string>")
     */
    protected $display;

    /**
     * {@inheritDoc}
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritDoc}
     */
    public function setDisplay(array $display)
    {
        $this->display = $display;
    }

    /**
     * {@inheritDoc}
     */
    public function getDisplay()
    {
        return $this->display;
    }
}
