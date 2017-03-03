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


use EcomDev\Image\Resource;
use PHPUnit\Framework\TestCase;

class GdAssertColor
{
    private $testCase;

    public function __construct(TestCase $testCase)
    {
        $this->testCase = $testCase;
    }

    public function assertColorAt(Resource $image, int $hexColor, int $x, int $y, int $colorDelta = 3)
    {
        $colorIndex = imagecolorat($image->reveal(), $x, $y);

        $expectedColor = [
            'red' => ($hexColor >> 16) & 0xFF,
            'green' => ($hexColor >> 8) & 0xFF,
            'blue' => $hexColor & 0xFF,
            'alpha' => ($hexColor & 0x7F000000) >> 24
        ];

        $actualColors = imagecolorsforindex($image->reveal(), $colorIndex);

        foreach ($expectedColor as $type => $value) {
            $this->testCase->assertEquals(
                $expectedColor[$type],
                $actualColors[$type],
                $type . ' color mismatch',
                $colorDelta
            );
        }
    }

    public function assertRedColorAt(Resource $image, int $x, int $y)
    {
        $this->assertColorAt($image, 0xFF0000, $x, $y);
    }

    public function assertGreenColorAt(Resource $image, int $x, int $y)
    {
        $this->assertColorAt($image, 0x00FF00, $x, $y);
    }

    public function assertBlueColorAt(Resource $image, int $x, int $y)
    {
        $this->assertColorAt($image, 0x0000FF, $x, $y);
    }

    public function assertWhiteColorAt(Resource $image, int $x, int $y)
    {
        $this->assertColorAt($image, 0xFFFFFF, $x, $y);
    }

    public function assertBlackColorAt(Resource $image, int $x, int $y)
    {
        $this->assertColorAt($image, 0x000000, $x, $y);
    }
}
