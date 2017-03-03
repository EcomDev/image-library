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


namespace EcomDev\Image\Gd;

use PHPUnit\Framework\TestCase;

class CreatedResourceTest extends TestCase
{
    private $resource;

    protected function setUp()
    {
        $this->resource = imagecreatetruecolor(50, 50);
    }



    function test_it_implements_resource_interface()
    {
        $this->assertInstanceOf(\EcomDev\Image\Resource::class, new CreatedResource($this->resource));
    }

    function test_it_does_pass_along_gd_resource()
    {
        $resource = new CreatedResource($this->resource);
        $this->assertTrue(is_resource($this->resource), 'Object is not destroyed at this point');
        $this->assertSame($this->resource, $resource->reveal());
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A variable of type "NULL" is not a valid GD resource
     */
    function test_it_does_not_allow_non_resource_input()
    {
        new CreatedResource(null);
    }

    /**
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage A variable of type "resource" is not a valid GD resource
     */
    function test_it_does_not_allow_file_resource_as_input()
    {
        new CreatedResource(STDOUT);
    }


    function test_it_destroys_image_resource_when_object_is_destroyed()
    {
        $resource = new CreatedResource($this->resource);
        unset($resource);
        $this->assertFalse(is_resource($this->resource));
    }

    protected function tearDown()
    {
        if (is_resource($this->resource)) {
            imagedestroy($this->resource);
        }
    }
}
