<?php

namespace EcomDev\Image;

class ResourceProxy implements Resource
{
    private $resourceFactory;
    private $resource;

    public function __construct(callable $resourceFactory)
    {
        $this->resourceFactory = $resourceFactory;
    }

    public function reveal()
    {
        $this->createResourceIfNotYetCreated();
        return $this->resource->reveal();
    }

    private function createResourceIfNotYetCreated()
    {
        if ($this->resource === null) {
            $this->resource = ($this->resourceFactory)();
        }
    }
}
