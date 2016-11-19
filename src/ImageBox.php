<?php
/**
 * Image Library
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the MIT License
 * that is bundled with this package in the file LICENSE.
 *
 * It is also available through the world-wide-web at this URL:
 * https://opensource.org/licenses/MIT
 *
 * @copyright Copyright (c) 2016 EcomDev BV (http://www.ecomdev.org)
 * @license   https://opensource.org/licenses/MIT The MIT License (MIT)
 * @author    Ivan Chepurnyi <ivan@ecomdev.org>
 */


namespace EcomDev\Image;

class ImageBox
{
    private $top;

    private $left;

    private $width;

    private $height;

    public function __construct(int $top, int $left, int $width, int $height)
    {
        $this->validatePosition('Top', $top);
        $this->validatePosition('Left', $left);
        $this->validateMeasure('Width', $width);
        $this->validateMeasure('Height', $height);

        $this->top = $top;
        $this->left = $left;
        $this->width = $width;
        $this->height = $height;
    }

    public function getTop(): int
    {
        return $this->top;
    }

    public function getLeft(): int
    {
        return $this->left;
    }


    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    private function validatePosition($name, $value)
    {
        if ($value < 0) {
            throw new \InvalidArgumentException(sprintf(
                '%s of the box should be an unsigned integer',
                $name
            ));
        }
    }

    private function validateMeasure($name, $value)
    {
        if ($value <= 0) {
            throw new \InvalidArgumentException(sprintf(
                '%s of the box should be a positive integer',
                $name
            ));
        }
    }
}
