<?php

namespace Iguid\Config;

class Config
{
    protected string $configPath;

    protected string $key;

    protected string $config;

    protected string $value;


    protected array $values;

    private string $default;

    protected string $fileName;
    
    protected string $file;

    public function __construct($value, $default = 'null')
    {
        $this->value = $value;
        $this->default = $default;
        $this->config = 'config';
        $this->configPath = dirname(getcwd()) . "/{$this->config}";
        $this->explode();
    }

    public function get()
    {
        $this->setLocationFile();
        if (!file_exists($this->file)) {
            return $this->default;
        }
        $file = include $this->file;

        if (! $this->values) {
            return $file;
        }
        try {
            foreach ($this->values as $key) {
                if (!isset($output)) {
                    if (!isset($file[$key])) {
                        return $this->default;
                    }
                    $output = $file[$key];
                } else {
                    $output = $output[$key];
                }
            }
            return $output ?? $this->default;
        } catch (\Exception $e) {
            return $this->default;
        }
    }


    private function setLocationFile()
    {
        $this->file = $this->configPath . '/' . $this->fileName . '.php';
    }

    private function explode(): void
    {
        $this->values = explode('.', $this->value);
        $this->fileName = $this->values[0];
        unset($this->values[0]);
    }

    public function getConfigPath()
    {
        return $this->configPath;
    }

    public function setConfigPath($configPath)
    {
        $this->configPath = realpath($configPath . "/{$this->config}");
        return $this->configPath;
    }

    public function getConfig()
    {
        return $this->config;
    }

    public function setConfig(string $config)
    {
        $this->config = $config;
    }
}
