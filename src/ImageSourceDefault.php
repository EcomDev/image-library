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

class ImageSourceDefault implements ImageSource
{
    private $resource;

    private $metadata;

    public function __construct(Resource $resource, ImageMetadata $imageMetadata)
    {
        $this->resource = $resource;
        $this->metadata = $imageMetadata;
    }

    public function getResource(): Resource
    {
        return $this->resource;
    }

    public function getMetadata(): ImageMetadata
    {
        return $this->metadata;
    }
}