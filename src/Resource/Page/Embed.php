<?php
namespace Kumamidori\ExampleChangeRenderer\Resource\Page;

use BEAR\Resource\ResourceObject;

class Embed extends ResourceObject
{
    public function onGet()
    {
        $this['foo'] = 'bar';

        return $this;
    }
}
