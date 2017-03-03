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


namespace EcomDev\Image\Gd;

class FileResourceFactory
{
    private $factoryMethodByMimeType;

    public function __construct()
    {
        $this->factoryMethodByMimeType = [
            'image/jpeg' => 'imagecreatefromjpeg',
            'image/gif' => 'imagecreatefromgif',
            'image/png' => 'imagecreatefrompng'
        ];
    }

    public function createWithMimeType($file, $mimeType): CreatedResource
    {
        return new CreatedResource($this->factoryMethodByMimeType[$mimeType]($file));
    }
}
