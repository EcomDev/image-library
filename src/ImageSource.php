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

interface ImageSource
{
    /**
     * Returns image resource required for image manipulations
     *
     * @return Resource
     */
    public function getResource();

    /**
     * Image dimension information
     *
     * @return ImageMetadata
     */
    public function getMetadata();
}
