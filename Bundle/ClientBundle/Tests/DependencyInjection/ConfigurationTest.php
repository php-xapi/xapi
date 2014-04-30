<?php

/*
 * This file is part of the XabbuhXApiClientBundle package.
 *
 * (c) Christian Flothmann <christian.flothmann@xabbuh.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Xabbuh\XApi\Bundle\ClientBundle\Tests\DependencyInjection;

use Symfony\Component\Config\Definition\Processor;
use Xabbuh\XApi\Bundle\ClientBundle\DependencyInjection\Configuration;

/**
 * @author Christian Flothmann <christian.flothmann@xabbuh.de>
 */
class ConfigurationTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Configuration
     */
    private $configuration;

    /**
     * @var Processor
     */
    private $processor;

    protected function setUp()
    {
        $this->configuration = new Configuration();
        $this->processor = new Processor();
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testBaseUrlRequired()
    {
        $this->processConfiguration(array(
            'clients' => array(
                'foo' => array(),
            ),
        ));
    }

    public function testDefaultVersion()
    {
        $config = $this->processConfiguration(array(
            'clients' => array(
                'foo' => array(
                    'base_url' => 'http://example.com/xapi',
                ),
            ),
        ));

        $this->assertEquals('1.0.1', $config['clients']['foo']['version']);
    }

    /**
     * @expectedException \Symfony\Component\Config\Definition\Exception\InvalidConfigurationException
     */
    public function testInvalidVersion()
    {
        $this->processConfiguration(array(
            'clients' => array(
                'foo' => array(
                    'base_url' => 'http://example.com/xapi',
                    'version' => '2.0',
                ),
            ),
        ));
    }

    /**
     * @dataProvider validVersions
     */
    public function testValidVersion($version)
    {
        $config = $this->processConfiguration(array(
            'clients' => array(
                'foo' => array(
                    'base_url' => 'http://example.com/xapi',
                    'version' => $version,
                ),
            ),
        ));

        $this->assertEquals($version, $config['clients']['foo']['version']);
    }

    private function processConfiguration(array $config)
    {
        return $this->processor->processConfiguration($this->configuration, array($config));
    }

    public function validVersions()
    {
        return array(array('1.0.0'), array('1.0.1'));
    }
}
