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

namespace EcomDev\Image\Gd;

use EcomDev\Image\FileImageMetadataFactory;
use EcomDev\Image\ImageMetadata;
use EcomDev\Image\ImageSource;
use EcomDev\Image\ImageSourceDefault;

class ImageSourceFactory
{
    private $fileImageMetadataFactory;
    private $imageMetadataFactory;

    public function __construct(
        FileImageMetadataFactory $fileImageMetadataFactory = null,
        ImageMetadataFactory $imageMetadataFactory = null
    ) {
        $this->fileImageMetadataFactory = $fileImageMetadataFactory ?: new FileImageMetadataFactory();
        $this->imageMetadataFactory = $imageMetadataFactory ?: new ImageMetadataFactory();
    }

    public function createFromFile($fileName): ImageSource
    {
        $metadata = $this->fileImageMetadataFactory->create($fileName);

        return new ImageSourceDefault(
            $this->createGdResourceFromFile($fileName, $metadata),
            $metadata
        );
    }

    private function createGdResourceFromFile($filePath, ImageMetadata $metadata): Resource
    {
        if ($metadata->getMimeType() === 'image/jpeg') {
            return new Resource(imagecreatefromjpeg($filePath));
        }
    }
}
