<?php
namespace Kumamidori\ExampleChangeRenderer\Resource\Page\Api;

use BEAR\Package\AppInjector;
use BEAR\Resource\ResourceInterface;

class ExampleTest extends \PHPUnit_Framework_TestCase
{
    const URI = 'page://self/api/example';
    /**
     * @var \BEAR\Resource\ResourceInterface
     */
    private $resource;

    protected function setUp()
    {
        $this->resource = (new AppInjector('Kumamidori\ExampleChangeRenderer', 'app'))->getInstance(ResourceInterface::class);
    }

    public function testOnGetReturnsJsonViewEmbededHtmlCaseContextApp()
    {
        $appPage = $this->resource->get->uri(self::URI)->eager->request();

        $this->assertSame('{"html":"<html><h1>this is embed. bar<\/h1><\/html>"}', (string) $appPage);
    }
}
