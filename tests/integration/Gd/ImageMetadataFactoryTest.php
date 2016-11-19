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

use EcomDev\Image\FlipDirection;
use EcomDev\Image\Gd;
use EcomDev\Image\ImageMetadata;
use PHPUnit\Framework\TestCase;


class ImageMetadataFactoryTest extends TestCase
{
    private $factory;

    public function setUp()
    {
        $this->factory = new Gd\ImageMetadataFactory();
    }

    public function test_it_creates_metadata_from_gd_image_resource()
    {
        $image = new Gd\Resource(imagecreatetruecolor(500, 20));
        $dimension = $this->factory->create($image, 'image/jpeg');
        $this->assertImageMetadata($dimension, 500, 20, 'image/jpeg', 0, FlipDirection::none());
    }

    public function test_it_creates_metadata_with_custom_angle_and_flip_direction()
    {
        $image = new Gd\Resource(imagecreatetruecolor(500, 20));
        $dimension = $this->factory->create($image, 'image/jpeg', 90, FlipDirection::horizontal());
        $this->assertImageMetadata($dimension, 500, 20, 'image/jpeg', 90, FlipDirection::horizontal());
    }

    private function assertImageMetadata(
        ImageMetadata $imageMetadata,
        int $width,
        int $height,
        string $mimeType,
        int $angle,
        FlipDirection $flipDirection
    ) {
        $this->assertInstanceOf(ImageMetadata::class, $imageMetadata);
        $this->assertEquals($mimeType, $imageMetadata->getMimetype());
        $this->assertEquals($width, $imageMetadata->getWidth());
        $this->assertEquals($height, $imageMetadata->getHeight());
        $this->assertEquals($angle, $imageMetadata->getRotationAngle());
        $this->assertSame($flipDirection, $imageMetadata->getFlipDirection());
    }
}
