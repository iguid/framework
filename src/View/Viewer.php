<?php

namespace Iguid\View;

use PDO;

class Viewer
{
    protected $name;

    protected $data;

    protected $directory;

    protected bool $isRender;

    protected string $file;

    protected const EXT = '.php';

    public function __construct($name, array $data = [], $directory = null)
    {
        $this->name = $name;
        $this->data = $data;
        $this->directory = dirname(dirname(dirname(__DIR__))) . '/iguid/resources/views';
        $this->isRender = false;
        if ($directory) {
            $this->setDirectory($directory);
        }

        $this->file = $this->formatDirectory();
    }

    public function render()
    {
        $this->isRender = true;
        ob_start();
        include $this->file;

        return ob_get_clean();
    }

    protected function formatDirectory()
    {
        $ext = explode('.', $this->name);
        $ext = end($ext) == 'php' ? '' : '.php';
        $directory = '';
        $directory = $this->directory . '/' . $this->name . $ext;
        return $directory;
    }

    // protected function getFile()
    // {
    //     if ($this->directory . '/' . $this->name)
    // }

    public function setDirectory($directory)
    {
        $this->directory = $directory;
    }

    public function __destruct()
    {
        if (! $this->isRender) {
            include $this->file;
        }
    }
}
