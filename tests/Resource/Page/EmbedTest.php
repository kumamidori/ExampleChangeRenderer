<?php
namespace Kumamidori\ExampleChangeRenderer\Resource\Page;

use BEAR\Package\AppInjector;
use BEAR\Resource\ResourceInterface;
use PHPUnit\Framework\TestCase;

class EmbedTest extends TestCase
{
    const URI = 'page://self/embed';
    /**
     * @var \BEAR\Resource\ResourceInterface
     */
    private $resource;

    protected function setUp()
    {
        $this->resource = (new AppInjector('Kumamidori\ExampleChangeRenderer', 'html-app'))->getInstance(ResourceInterface::class);
    }

    public function testOnGetReturnsHtmlViewCaseContextHtml()
    {
        $htmlPage = $this->resource->get->uri(self::URI)->eager->request();
        $this->assertSame('<html><h1>this is embed. bar</h1></html>', (string) $htmlPage);
    }
}
