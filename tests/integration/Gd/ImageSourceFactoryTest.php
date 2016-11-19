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


use EcomDev\Image\Gd\ImageSourceFactory;
use EcomDev\Image\ImageSource;
use PHPUnit\Framework\TestCase;

class ImageSourceFactoryTest extends TestCase
{
    private $factory;
    /**
     * @var AssertColor
     */
    private $colorAssert;

    protected function setUp()
    {
        $this->factory = new ImageSourceFactory();
        $this->colorAssert = new AssertColor($this);
    }

    function test_it_creates_image_source_from_jpeg_file()
    {
        $imageSource = $this->factory->createFromFile(__DIR__ . '/../fixture/image.jpg');
        $this->assertInstanceOf(ImageSource::class, $imageSource);
        $this->colorAssert->assertWhiteColorAt($imageSource->getResource(), 250, 250);
        $this->colorAssert->assertBlueColorAt($imageSource->getResource(), 750, 250);
        $this->colorAssert->assertRedColorAt($imageSource->getResource(), 250, 750);
        $this->colorAssert->assertGreenColorAt($imageSource->getResource(), 750, 750);
    }



}
