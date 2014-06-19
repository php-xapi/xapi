<?php

/*
 * This file is part of the xAPI package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Common\Test\Fixture;

/**
 * JSON encoded fixtures.
 *
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
abstract class JsonFixtures
{
    /**
     * Loads a JSON encoded fixture from the file system
     *
     * @param string $file The fixture to load
     *
     * @return string The JSON encoded fixture
     */
    protected static function load($file)
    {
        return file_get_contents(__DIR__.'/fixtures/'.$file.'.json');
    }
}
