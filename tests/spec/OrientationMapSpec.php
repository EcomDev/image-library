<?php

namespace spec\EcomDev\Image;

use EcomDev\Image\FlipDirection;
use EcomDev\Image\OrientationMap;
use PhpSpec\ObjectBehavior;

class OrientationMapSpec extends ObjectBehavior
{
    function it_is_not_rotated_and_not_flipped_when_orientation_is_1()
    {
        $this->rotationAngle(OrientationMap::NORMAL)->shouldReturn(0);
        $this->flipDirection(OrientationMap::NORMAL)->shouldReturn(FlipDirection::none());
    }

    function it_is_not_rotated_but_flipped_when_orientation_2()
    {
        $this->rotationAngle(OrientationMap::MIRROR_HORIZONTAL)->shouldReturn(0);
        $this->flipDirection(OrientationMap::MIRROR_HORIZONTAL)->shouldReturn(FlipDirection::horizontal());
    }

    function it_is_not_flipped_but_rotated_180_dergress_when_orientation_3()
    {
        $this->rotationAngle(OrientationMap::ROTATED_180)->shouldReturn(180);
        $this->flipDirection(OrientationMap::ROTATED_180)->shouldReturn(FlipDirection::none());
    }

    function it_is_not_rotated_but_flipped_vertical_when_orientation_is_4()
    {
        $this->rotationAngle(OrientationMap::MIRROR_VERTICAL)->shouldReturn(0);
        $this->flipDirection(OrientationMap::MIRROR_VERTICAL)->shouldReturn(FlipDirection::vertical());
    }

    function it_is_rotated_270_degrees_and_flipped_horizontal_when_orientation_is_5()
    {
        $this->rotationAngle(OrientationMap::MIRROR_HORIZONTAL_ROTATED_270)->shouldReturn(270);
        $this->flipDirection(OrientationMap::MIRROR_HORIZONTAL_ROTATED_270)->shouldReturn(FlipDirection::horizontal());
    }

    function it_is_rotated_270_degrees_and_not_flipped_when_orientation_is_6()
    {
        $this->rotationAngle(OrientationMap::ROTATED_270)->shouldReturn(270);
        $this->flipDirection(OrientationMap::ROTATED_270)->shouldReturn(FlipDirection::none());
    }

    function it_is_rotated_270_degrees_and_flipped_horizontal_when_orientation_is_7()
    {
        $this->rotationAngle(OrientationMap::MIRROR_HORIZONTAL_ROTATED_90)->shouldReturn(90);
        $this->flipDirection(OrientationMap::MIRROR_HORIZONTAL_ROTATED_90)->shouldReturn(FlipDirection::horizontal());
    }

    function it_is_rotated_90_degrees_and_not_flipped_when_orientation_is_8()
    {
        $this->rotationAngle(OrientationMap::ROTATED_90)->shouldReturn(90);
        $this->flipDirection(OrientationMap::ROTATED_90)->shouldReturn(FlipDirection::none());
    }
}
