<?php
namespace Kumamidori\ExampleChangeRenderer;

use BEAR\Package\Bootstrap;
use BEAR\Sunday\Extension\Application\AbstractApp;
use PHPUnit\Framework\TestCase;

class ModuleTest extends TestCase
{
    public function contextsProvider()
    {
        return [
            ['prod-hal-api-app'],
        ];
    }

    /**
     * @dataProvider contextsProvider
     *
     * @param string $contexts
     */
    public function testNewApp($contexts)
    {
        $app = (new Bootstrap())->getApp(__NAMESPACE__, $contexts);
        $this->assertInstanceOf(AbstractApp::class, $app);
    }
}
