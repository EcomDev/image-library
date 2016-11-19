<?php

namespace spec\EcomDev\Image;

use EcomDev\Image\FlipDirection;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class FlipDirectionSpec extends ObjectBehavior
{

    function it_is_vertical_and_horizontal_flip_if_direction_is_both()
    {
        $this->beConstructedThrough('both');
        $this->is(FlipDirection::FLIP_HORIZONTAL)->shouldReturn(true);
        $this->is(FlipDirection::FLIP_VERTICAL)->shouldReturn(true);
    }

    function it_is_not_vertical_and_horizontal_flip_if_direction_is_none()
    {
        $this->beConstructedThrough('none');
        $this->is(FlipDirection::FLIP_HORIZONTAL)->shouldReturn(false);
        $this->is(FlipDirection::FLIP_VERTICAL)->shouldReturn(false);
        $this->is(FlipDirection::FLIP_NONE)->shouldReturn(true);
    }


    function it_is_not_none_direction_if_it_is_vertical_flip()
    {
        $this->beConstructedThrough('vertical');
        $this->is(FlipDirection::FLIP_NONE)->shouldReturn(false);
    }


    function it_is_both_flip_if_direction_is_both()
    {
        $this->beConstructedThrough('both');
        $this->is(FlipDirection::FLIP_BOTH)->shouldReturn(true);
    }


    function it_is_not_horizontal_flip_if_direction_is_vertical()
    {
        $this->beConstructedThrough('vertical');
        $this->is(FlipDirection::FLIP_HORIZONTAL)->shouldReturn(false);
        $this->is(FlipDirection::FLIP_VERTICAL)->shouldReturn(true);
    }

    function it_returns_flip_none_value_when_constructed_via_none_factory_method()
    {
        $this->beConstructedThrough('none');
        $this->shouldBe(FlipDirection::none());
    }

    function it_returns_flip_vertical_value_when_constructed_via_vertical_factory_method()
    {
        $this->beConstructedThrough('vertical');
        $this->shouldBe(FlipDirection::vertical());
    }

    function it_returns_flip_horizontal_value_when_constructed_via_horizontal_factory_method()
    {
        $this->beConstructedThrough('horizontal');
        $this->shouldBe(FlipDirection::horizontal());
    }


    function it_returns_flip_both_value_when_constructed_via_both_factory_method()
    {
        $this->beConstructedThrough('both');
        $this->shouldBe(FlipDirection::both());
    }

}
