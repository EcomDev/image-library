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

class FileImageMetadataFactory
{
    private $orientationMap;

    public function __construct()
    {
        $this->orientationMap = new OrientationMap();
    }

    public function createFromFile(string $imageFile)
    {
        if (!file_exists($imageFile)) {
            throw new ImageFileNotFoundException($imageFile);
        }

        $sizeInfo = @getimagesize($imageFile);

        if ($sizeInfo === false) {
            throw new ImageNotReadableException($imageFile);
        }

        list($width, $height) = $sizeInfo;

        $orientation = $this->extractImageOrientation($imageFile, $sizeInfo['mime']);

        return new ImageMetadata(
            $width,
            $height,
            $sizeInfo['mime'],
            $this->orientationMap->rotationAngle($orientation),
            $this->orientationMap->flipDirection($orientation)
        );
    }

    private function extractImageOrientation(string $imageFile, string $mimeType): int
    {
        if ($mimeType == 'image/jpeg') {
            $data = exif_read_data($imageFile);
            return isset($data['Orientation']) ? $data['Orientation'] : 1;
        }

        return 1;
    }
}
