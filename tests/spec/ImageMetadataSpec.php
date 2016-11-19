<?php

namespace spec\EcomDev\Image;

use EcomDev\Image\FlipDirection;
use EcomDev\Image\ImageMetadata;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class ImageMetadataSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWith(100, 200, 'image/jpeg');
    }

    function it_returns_mimetype_from_constructor_argument()
    {
        $this->getMimeType()->shouldReturn('image/jpeg');
    }

    function it_returns_width_from_constructor_argument()
    {
        $this->getWidth()->shouldReturn(100);
    }

    function it_returns_height_from_constructor_argument()
    {
        $this->getHeight()->shouldReturn(200);
    }

    function it_returns_default_rotation_angle_when_no_rotation_angle_passed()
    {
        $this->getRotationAngle()->shouldReturn(0);
    }

    function it_returns_rotation_angle_from_constructor_argument()
    {
        $this->beConstructedWith(0, 0, '', 90);
        $this->getRotationAngle()->shouldReturn(90);
    }

    function it_returns_default_flip_direction_when_no_flip_direction_passed_in_constructor()
    {
        $this->getFlipDirection()->shouldReturn(FlipDirection::none());
    }

    function it_returns_flip_direction_from_constructor_argument()
    {
        $this->beConstructedWith(0, 0, '', 0, FlipDirection::horizontal());
        $this->getFlipDirection()->shouldReturn(FlipDirection::horizontal());
    }
}
