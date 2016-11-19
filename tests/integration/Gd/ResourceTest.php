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


use EcomDev\Image\Gd;
use EcomDev\Image\Resource;
use PHPUnit\Framework\TestCase;


class ResourceTest extends TestCase
{
    function test_it_implements_resource_interface()
    {
        $this->assertInstanceOf(Resource::class, new Gd\Resource(imagecreatetruecolor(50, 50)));
    }

    function test_it_does_pass_along_gd_resource()
    {
        $rawResource = imagecreatetruecolor(50, 50);
        $resource = new Gd\Resource($rawResource);
        $this->assertTrue(is_resource($rawResource), 'Object is not destroyed at this point');
        $this->assertSame($rawResource, $resource->reveal());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A variable of type "NULL" is not a valid GD resource
     */
    function test_it_does_not_allow_non_resource_input()
    {
        new Gd\Resource(null);
    }

    function test_it_destroys_image_resource_when_object_is_destroyed()
    {
        $rawResource = imagecreatetruecolor(50, 50);
        $resource = new Gd\Resource($rawResource);
        unset($resource);
        $this->assertFalse(is_resource($rawResource));
    }
}
