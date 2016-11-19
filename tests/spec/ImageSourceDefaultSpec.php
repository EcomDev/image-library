<?php

namespace spec\EcomDev\Image;

use EcomDev\Image\ImageMetadata;
use EcomDev\Image\ImageSource;
use EcomDev\Image\ImageSourceDefault;
use EcomDev\Image\Resource;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImageSourceDefaultSpec extends ObjectBehavior
{
    function let(Resource $resource, ImageMetadata $metadata)
    {
        $this->beConstructedWith($resource, $metadata);
    }

    function it_implements_ImageSource_interface()
    {
        $this->shouldImplement(ImageSource::class);
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
