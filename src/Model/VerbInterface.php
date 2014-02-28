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

/**
 * The verb in a {@link Statement}.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
interface VerbInterface
{
    /**
     * Sets the verb definition reference.
     *
     * @param string $id The reference
     */
    public function setId($id);

    /**
     * Returns the verb definition reference.
     *
     * @return string The reference
     */
    public function getId();

    /**
     * Sets the human readable representation of the Verb in one or more languages.
     *
     * @param array $display The mapping of languages to human readable strings
     */
    public function setDisplay(array $display);

    /**
     * Returns the human readable representation of the Verb in one or more languages.
     *
     * @return array The language map
     */
    public function getDisplay();
}
