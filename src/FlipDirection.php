<?php

declare(strict_types=1);

namespace EcomDev\Image;

/**
 * Class FlipDirection
 */
final class FlipDirection
{
    // Image is not flipped
    const FLIP_NONE = 0;

    // Image is flipped horizontally
    const FLIP_HORIZONTAL = 1;

    // Image is flipped vertically
    const FLIP_VERTICAL = 2;

    // Image is flipped both horizontally and vertically
    const FLIP_BOTH = 3;

    private $value;

    /**
     * List of enum values created only ones
     *
     * @var FlipDirection[]
     */
    private static $enum;

    private function __construct(int $value)
    {
        $this->value = $value;
    }

    public function is(int $directionBit): bool
    {
        if ($directionBit === self::FLIP_NONE) {
            return $this->value === $directionBit;
        }

        return ($this->value & $directionBit) === $directionBit;
    }

    public static function both()
    {
        return self::enum()[self::FLIP_BOTH];
    }

    public static function horizontal()
    {
        return self::enum()[self::FLIP_HORIZONTAL];
    }

    public static function vertical()
    {
        return self::enum()[self::FLIP_VERTICAL];
    }

    public static function none()
    {
        return self::enum()[self::FLIP_NONE];
    }

    private static function enum(): array
    {
        if (self::$enum === null) {
            self::$enum = [
                self::FLIP_NONE => new self(self::FLIP_NONE),
                self::FLIP_VERTICAL => new self(self::FLIP_VERTICAL),
                self::FLIP_HORIZONTAL => new self(self::FLIP_HORIZONTAL),
                self::FLIP_BOTH => new self(self::FLIP_BOTH)
            ];
        }

        return self::$enum;
    }
}
