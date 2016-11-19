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

class Resource implements \EcomDev\Image\Resource
{
    /**
     * Raw GD image resource
     *
     * @var resource
     */
    private $rawResource;

    public function __construct($rawResource)
    {
        if (!is_resource($rawResource)) {
            throw new \InvalidArgumentException(
                sprintf(
                    'A variable of type "%s" is not a valid GD resource',
                    gettype($rawResource)
                )
            );
        }

        $this->rawResource = $rawResource;
    }

    /**
     * Returns raw gd resource
     *
     * @return resource
     */
    public function reveal()
    {
        return $this->rawResource;
    }

    /**
     * Cleanups image resource from memory
     */
    public function __destruct()
    {
        if (is_resource($this->rawResource)) {
            imagedestroy($this->rawResource);
        }
    }
}
