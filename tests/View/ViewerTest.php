<?php

use Iguid\View\View;
use Iguid\View\Viewer;
use PHPUnit\Framework\TestCase;

class ViewerTest extends TestCase
{
    public function testRenderViewer()
    {
        $viewer = new Viewer('data', [], __DIR__);
        $data = $viewer->render();
        $this->assertEquals($data['data'], 'test');
    }
    
}
