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

declare(strict_types=1);

namespace EcomDev\Image;

/**
 * Horrible EXIF orientation code map magic
 */
class OrientationMap
{
    private $rotateAngleToOrientationMap;

    private $flipDirectionToOrientationMap;

    public function __construct()
    {
        $this->initFlipDirectionToOrientation();
        $this->initRotationAngleToOrientation();
    }

    public function rotationAngle(int $orientation): int
    {
        if (isset($this->rotateAngleToOrientationMap[$orientation])) {
            return $this->rotateAngleToOrientationMap[$orientation];
        }

        return 0;
    }

    public function flipDirection(int $orientation): FlipDirection
    {
        if (isset($this->flipDirectionToOrientationMap[$orientation])) {
            return $this->flipDirectionToOrientationMap[$orientation];
        }

        return FlipDirection::none();
    }

    private function initFlipDirectionToOrientation()
    {
        $this->flipDirectionToOrientationMap = [
            2 => FlipDirection::horizontal(),
            7 => FlipDirection::horizontal(),
            5 => FlipDirection::horizontal(),
            4 => FlipDirection::vertical()
        ];
    }

    private function initRotationAngleToOrientation()
    {
        $this->rotateAngleToOrientationMap = [
            8 => 90,
            7 => 90,
            3 => 180,
            6 => 270,
            5 => 270
        ];
    }
}
