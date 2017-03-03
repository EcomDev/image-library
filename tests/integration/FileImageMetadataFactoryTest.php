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


namespace EcomDev\Image\TestIntegration;


use EcomDev\Image\FlipDirection;
use EcomDev\Image\ImageMetadata;
use EcomDev\Image\FileImageMetadataFactory;
use PHPUnit\Framework\TestCase;


class FileImageMetadataFactoryTest extends TestCase
{
    /**
     * @var FileImageMetadataFactory
     */
    private $factory;

    protected function setUp()
    {
        $this->factory = new FileImageMetadataFactory();
    }

    function test_it_reads_correctly_data_on_default_JPEG_image()
    {
        $imageMetadata = $this->factory->createFromFile(__DIR__ . '/fixture/image.jpg');
        $this->assertImageMetadata($imageMetadata, 1000, 1000, 'image/jpeg', 0, FlipDirection::none());
    }

    function test_it_reads_correctly_data_on_fliped_JPEG_image()
    {
        $imageMetadata = $this->factory->createFromFile(__DIR__ . '/fixture/image_or2.jpg');
        $this->assertImageMetadata($imageMetadata, 1000, 1000, 'image/jpeg', 0, FlipDirection::horizontal());
    }

    function test_it_reads_correctly_data_on_rotated_180_degrees_JPEG_image()
    {
        $imageMetadata = $this->factory->createFromFile(__DIR__ . '/fixture/image_or3.jpg');
        $this->assertImageMetadata($imageMetadata, 1000, 1000, 'image/jpeg', 180, FlipDirection::none());
    }

    function test_it_reads_correctly_data_on_flipped_vertically_JPEG_image()
    {
        $imageMetadata = $this->factory->createFromFile(__DIR__ . '/fixture/image_or4.jpg');
        $this->assertImageMetadata($imageMetadata, 1000, 1000, 'image/jpeg', 0, FlipDirection::vertical());
    }

    function test_it_reads_correctly_data_on_rotated_270_degrees_and_flipped_hirizontaly_JPEG_image()
    {
        $imageMetadata = $this->factory->createFromFile(__DIR__ . '/fixture/image_or5.jpg');
        $this->assertImageMetadata($imageMetadata, 1000, 1000, 'image/jpeg', 270, FlipDirection::horizontal());
    }


    function test_it_reads_correctly_data_on_rotated_270_degrees_JPEG_image()
    {
        $imageMetadata = $this->factory->createFromFile(__DIR__ . '/fixture/image_or6.jpg');
        $this->assertImageMetadata($imageMetadata, 1000, 1000, 'image/jpeg', 270, FlipDirection::none());
    }


    function test_it_reads_correctly_data_on_rotated_90_degrees_and_flipped_hirizontaly_JPEG_image()
    {
        $imageMetadata = $this->factory->createFromFile(__DIR__ . '/fixture/image_or7.jpg');
        $this->assertImageMetadata($imageMetadata, 1000, 1000, 'image/jpeg', 90, FlipDirection::horizontal());
    }

    function test_it_reads_correctly_data_on_rotated_90_degrees_JPEG_image()
    {
        $imageMetadata = $this->factory->createFromFile(__DIR__ . '/fixture/image_or8.jpg');
        $this->assertImageMetadata($imageMetadata, 1000, 1000, 'image/jpeg', 90, FlipDirection::none());
    }

    function test_it_reads_correctly_data_on__PNG_image()
    {
        $imageMetadata = $this->factory->createFromFile(__DIR__ . '/fixture/image.png');
        $this->assertImageMetadata($imageMetadata, 1000, 1000, 'image/png', 0, FlipDirection::none());
    }

    /**
     * @expectedException \EcomDev\Image\ImageFileNotFoundException
     */
    function test_it_thorws_an_exception_when_file_does_not_exists()
    {
        $this->factory->createFromFile(__DIR__ . '/fixture/image_does_not_exists.png');
    }

    /**
     * @expectedException \EcomDev\Image\ImageNotReadableException
     */
    function test_it_thorws_an_exception_when_file_is_corrupted()
    {
        $this->factory->createFromFile(__DIR__ . '/fixture/image_corrupted.png');
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
