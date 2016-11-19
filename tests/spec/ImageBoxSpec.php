<?php

namespace spec\EcomDev\Image;

use EcomDev\Image\Rectangle;
use PhpSpec\ObjectBehavior;

class ImageBoxSpec extends ObjectBehavior
{
    function it_throws_invalid_argument_exception_if_width_not_a_positive_value()
    {
        $this->beConstructedWith(0, 0, 0, 10);
        $this->shouldThrow(new \InvalidArgumentException('Width of the box should be a positive integer'))
            ->duringInstantiation();
    }

    function it_throws_invalid_argument_exception_if_height_not_a_positive_value()
    {
        $this->beConstructedWith(0, 0, 10, 0);
        $this->shouldThrow(new \InvalidArgumentException('Height of the box should be a positive integer'))
            ->duringInstantiation();
    }

    function it_throws_invalid_argument_exception_if_top_is_negative_value()
    {
        $this->beConstructedWith(-1, 0, 10, 10);
        $this->shouldThrow(new \InvalidArgumentException('Top of the box should be an unsigned integer'))
            ->duringInstantiation();
    }


    function it_throws_invalid_argument_exception_if_left_is_negative_value()
    {
        $this->beConstructedWith(0, -1, 10, 10);
        $this->shouldThrow(new \InvalidArgumentException('Left of the box should be an unsigned integer'))
            ->duringInstantiation();
    }

    function it_wraps_positon_and_measure_into_getters()
    {
        $this->beConstructedWith(10, 20, 100, 400);
        $this->getTop()->shouldReturn(10);
        $this->getLeft()->shouldReturn(20);
        $this->getWidth()->shouldReturn(100);
        $this->getHeight()->shouldReturn(400);
    }
}
