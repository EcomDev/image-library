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
 * @copyright  Copyright (c) 2016 EcomDev BV (http://www.ecomdev.org)
 * @license    https://opensource.org/licenses/MIT The MIT License (MIT)
 * @author     Ivan Chepurnyi <ivan@ecomdev.org>
 */


namespace EcomDev\Image\TestIntegration\Gd;


use EcomDev\Image\Gd\GdAssertColor;
use EcomDev\Image\Gd\FileResourceFactory;
use EcomDev\Image\Resource;
use PHPUnit\Framework\TestCase;

class FileResourceFactoryTest extends TestCase
{
    /**
     * @var GdAssertColor
     */
    private $colorAssert;

    private $factory;

    protected function setUp()
    {
        $this->colorAssert = new GdAssertColor($this);
        $this->factory = new FileResourceFactory();
    }

    private function assertValidFourColorSquareImage(Resource $imageSource)
    {
        $this->colorAssert->assertWhiteColorAt($imageSource, 250, 250);
        $this->colorAssert->assertBlueColorAt($imageSource, 750, 250);
        $this->colorAssert->assertRedColorAt($imageSource, 250, 750);
        $this->colorAssert->assertGreenColorAt($imageSource, 750, 750);
    }

    function test_it_creates_image_source_from_jpeg_file_with_mime_type_specified()
    {
        $resource = $this->factory->createWithMimeType(ECOMDEV_IMAGE_IMAGE_FIXTURE_PATH . 'image.jpg', 'image/jpeg');
        $this->assertValidFourColorSquareImage($resource);
    }

    function test_it_creates_image_source_from_png_file_with_mime_type_specified()
    {
        $resource = $this->factory->createWithMimeType(ECOMDEV_IMAGE_IMAGE_FIXTURE_PATH . 'image.png', 'image/png');
        $this->assertValidFourColorSquareImage($resource);
    }

    function test_it_creates_image_source_from_gif_file_by_mime_type_specified()
    {
        $resource = $this->factory->createWithMimeType(ECOMDEV_IMAGE_IMAGE_FIXTURE_PATH . 'image.gif', 'image/gif');
        $this->assertValidFourColorSquareImage($resource);
    }

    function test_it_detects_automatically_mimetype_of_the_image()
    {

    }
}
