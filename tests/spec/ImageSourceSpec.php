<?php

namespace spec\EcomDev\Image;

use EcomDev\Image\ImageMetadata;
use EcomDev\Image\Resource;
use PhpSpec\ObjectBehavior;

class ImageSourceSpec extends ObjectBehavior
{
    function let(Resource $resource, ImageMetadata $metadata)
    {
        $this->beConstructedWith($resource, $metadata);
    }

    function it_returns_correct_resource(Resource $resource)
    {
        $this->getResource()->shouldReturn($resource);
    }

    function it_returns_correct_metadata(ImageMetadata $metadata)
    {
        $this->getMetadata()->shouldReturn($metadata);
    }
}
