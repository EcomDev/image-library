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

class ImageSourceProxy implements ImageSource
{

    private $imageSourceFactory;

    private $imageSource;

    public function __construct(callable $imageSourceFactory)
    {
        $this->imageSourceFactory = $imageSourceFactory;
    }

    public function getResource(): Resource
    {
        return $this->getImageSource()->getResource();
    }

    public function getMetadata(): ImageMetadata
    {
        return $this->getImageSource()->getMetadata();
    }

    private function getImageSource(): ImageSource
    {
        if ($this->imageSource === null) {
            $this->imageSource = ($this->imageSourceFactory)();
        }

        return $this->imageSource;
    }
}
