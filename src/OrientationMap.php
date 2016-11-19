<?php

declare(strict_types=1);

namespace EcomDev\Image;

/**
 * Horrible EXIF orientation code map
 */
class OrientationMap
{
    const NORMAL = 1;
    const MIRROR_HORIZONTAL = 2;
    const ROTATED_180 = 3;
    const MIRROR_VERTICAL = 4;
    const MIRROR_HORIZONTAL_ROTATED_270 = 5;
    const ROTATED_270 = 6;
    const MIRROR_HORIZONTAL_ROTATED_90 = 7;
    const ROTATED_90 = 8;

    public function rotationAngle(int $orientation)
    {
        $angle = 0;
        switch ($orientation) {
            case self::ROTATED_180:
                $angle = 180;
                break;
            case self::ROTATED_90:
            case self::MIRROR_HORIZONTAL_ROTATED_90:
                $angle = 90;
                break;

            case self::ROTATED_270:
            case self::MIRROR_HORIZONTAL_ROTATED_270:
                $angle = 270;
                break;
        }

        return $angle;
    }

    public function flipDirection(int $orientation)
    {
        $direction = FlipDirection::none();
        switch ($orientation) {
            case self::MIRROR_HORIZONTAL:
            case self::MIRROR_HORIZONTAL_ROTATED_90:
            case self::MIRROR_HORIZONTAL_ROTATED_270:
                $direction = FlipDirection::horizontal();
                break;

            case self::MIRROR_VERTICAL:
                $direction = FlipDirection::vertical();
                break;
        }

        return $direction;
    }
}
