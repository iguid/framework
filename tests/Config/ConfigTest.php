<?php

namespace Config;

use Iguid\Config\Config;
use PHPUnit\Framework\TestCase;

class ConfigTest extends TestCase
{
    public function testSetConfigPath()
    {
        $config = new Config('app.app');
        $configPath = $config->setConfigPath(__DIR__);
        $this->assertEquals($configPath, __DIR__ . '/config');
    }

    public function testGetConfigPath()
    {
        $config = new Config('app.app');
        $this->assertEquals($config->getConfigPath(), dirname(dirname(dirname(__DIR__))) . '/config');
    }

    public function testGetData()
    {
        $config = new Config('app.app', 'testDefault');
        $config->setConfigPath(__DIR__);
        $this->assertEquals($config->get(), 'test');
    }

    public function testGetDataFileAll()
    {
        $config = new Config('app', 'testDefault');
        $config->setConfigPath(__DIR__);
        $this->assertEquals($config->get(), [
            'app' => 'test',
            'something' => [
                'app2' => 'test app2'
            ]
        ]);
    }

    public function testGetDataDefault()
    {
        $config = new Config('app.something.app', 'testDefault');
        $config->setConfigPath(__DIR__);
        $this->assertEquals($config->get(), 'testDefault');
    }
    
}
