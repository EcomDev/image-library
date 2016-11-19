<?php

namespace spec\EcomDev\Image;

use EcomDev\Image\FlipDirection;
use PhpSpec\ObjectBehavior;

class OrientationMapSpec extends ObjectBehavior
{
    function it_is_not_rotated_and_not_flipped_when_orientation_is_1()
    {
        $this->rotationAngle(1)->shouldReturn(0);
        $this->flipDirection(1)->shouldReturn(FlipDirection::none());
    }

    function it_is_not_rotated_but_flipped_when_orientation_2()
    {
        $this->rotationAngle(2)->shouldReturn(0);
        $this->flipDirection(2)->shouldReturn(FlipDirection::horizontal());
    }

    function it_is_not_flipped_but_rotated_180_dergress_when_orientation_3()
    {
        $this->rotationAngle(3)->shouldReturn(180);
        $this->flipDirection(3)->shouldReturn(FlipDirection::none());
    }

    function it_is_not_rotated_but_flipped_vertical_when_orientation_is_4()
    {
        $this->rotationAngle(4)->shouldReturn(0);
        $this->flipDirection(4)->shouldReturn(FlipDirection::vertical());
    }

    function it_is_rotated_270_degrees_and_flipped_horizontal_when_orientation_is_5()
    {
        $this->rotationAngle(5)->shouldReturn(270);
        $this->flipDirection(5)->shouldReturn(FlipDirection::horizontal());
    }

    function it_is_rotated_270_degrees_and_not_flipped_when_orientation_is_6()
    {
        $this->rotationAngle(6)->shouldReturn(270);
        $this->flipDirection(6)->shouldReturn(FlipDirection::none());
    }

    function it_is_rotated_270_degrees_and_flipped_horizontal_when_orientation_is_7()
    {
        $this->rotationAngle(7)->shouldReturn(90);
        $this->flipDirection(7)->shouldReturn(FlipDirection::horizontal());
    }

    function it_is_rotated_90_degrees_and_not_flipped_when_orientation_is_8()
    {
        $this->rotationAngle(8)->shouldReturn(90);
        $this->flipDirection(8)->shouldReturn(FlipDirection::none());
    }
}
