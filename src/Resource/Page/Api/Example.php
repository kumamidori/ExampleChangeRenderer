<?php
namespace Kumamidori\ExampleChangeRenderer\Resource\Page\Api;

use BEAR\Resource\ResourceObject;
use BEAR\Sunday\Inject\ResourceInject;

class Example extends ResourceObject
{
    use ResourceInject;

    public function onGet()
    {
        $embed = $this->resource->get->uri('page://self/embed')->eager->request();
        $this['html'] = (string) $embed;

        return $this;
    }
}
