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

class CreatedResource implements \EcomDev\Image\Resource
{
    private $resource;

    public function __construct($resource)
    {
        if (!is_resource($resource) || get_resource_type($resource) !== 'gd') {
            throw new \InvalidArgumentException(
                sprintf(
                    'A variable of type "%s" is not a valid GD resource',
                    gettype($resource)
                )
            );
        }

        $this->resource = $resource;
    }

    /**
     * Returns raw gd resource
     *
     * @return resource
     */
    public function reveal()
    {
        return $this->resource;
    }

    /**
     * Cleanups image resource from memory
     */
    public function __destruct()
    {
        if (is_resource($this->resource)) {
            imagedestroy($this->resource);
        }
    }
}
