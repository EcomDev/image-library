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

/**
 * Wrapper around system resource
 *
 * In case if all references to resource instance gets equal to 0
 * it should automatically de-allocate all related memory
 */
interface Resource
{
    /**
     * Reveals driver related image resource
     *
     * @return mixed
     */
    public function reveal();
}
