<?php
namespace Ruogu\Foundation\Traits;

use BadMethodCallException;

/**
 * Trait ControllerRoutable
 * @method static at(string $name): string
 * @method static route(string $name): string
 */
trait ControllerRoutable
{
    protected static function _at(string $method): string
    {
        if (method_exists(static::class, $method)) {
            return static::class . '@' . $method;
        }
        throw new BadMethodCallException;
    }

    public static function __callStatic($name, $arguments)
    {
        if ($name === 'route' || $name === 'at') {
            if (empty($arguments)) {
                throw new BadMethodCallException;
            }

            return static::_at($arguments[0]);
        }
    }
}
