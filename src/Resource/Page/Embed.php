<?php
namespace Kumamidori\ExampleChangeRenderer\Resource\Page;

use BEAR\Resource\RenderInterface;
use BEAR\Resource\ResourceObject;
use Ray\Di\Di\Inject;
use Ray\Di\Di\Named;

class Embed extends ResourceObject
{
    /**
     * @Inject
     * @Named("html")
     */
    public function setRenderer(RenderInterface $renderer)
    {
        return parent::setRenderer($renderer);
    }

    public function onGet()
    {
        $this['foo'] = 'bar';

        return $this;
    }
}
