<?php

namespace spec\EcomDev\Image;

use EcomDev\Image\ImageMetadata;
use EcomDev\Image\ImageSource;
use EcomDev\Image\ImageSourceProxy;
use EcomDev\Image\Resource;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImageSourceProxySpec extends ObjectBehavior
{
    private $expensiveImageSource;

    function it_implements_ImageSource_interface()
    {
        $this->beConstructedWith(function () {});
        $this->shouldImplement(ImageSource::class);
    }

    function it_creates_resource_only_once(
        ImageSource $expensiveImageSource,
        Resource $resource,
        ImageMetadata $imageMetadata
    ){
        $expensiveImageSource->getResource()->willReturn($resource);
        $expensiveImageSource->getMetadata()->willReturn($imageMetadata);
        $this->expensiveImageSource = $expensiveImageSource;

        $this->beConstructedWith(
            function ()  {
                if ($this->expensiveImageSource) {
                    $expensiveImageSource = $this->expensiveImageSource->getWrappedObject();
                    $this->expensiveImageSource = null;
                    return $expensiveImageSource;
                }
            }
        );

        $this->getResource()->shouldReturn($resource);
        $this->getMetadata()->shouldReturn($imageMetadata);
    }
}
