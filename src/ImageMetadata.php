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

class ImageMetadata
{
    private $width;

    private $height;

    private $rotationAngle;

    private $flipDirection;

    private $mimeType;

    public function __construct(
        int $width,
        int $height,
        string $mimeType,
        int $rotationAngle = 0,
        FlipDirection $flipDirection = null
    ) {
        $this->width = $width;
        $this->height = $height;
        $this->mimeType = $mimeType;
        $this->rotationAngle = $rotationAngle;
        $this->flipDirection = $flipDirection ?: FlipDirection::none();
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getRotationAngle(): int
    {
        return $this->rotationAngle;
    }

    public function getFlipDirection(): FlipDirection
    {
        return $this->flipDirection;
    }

    public function getMimeType(): string
    {
        return $this->mimeType;
    }
}
