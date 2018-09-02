<?php
/**
 * This file is part of ruogu-community.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Traits\Magical;

/**
 * 给类方法增加静态调用方式
 * Trait CallStatic
 * @namespace Ruogu\Foundation\Traits\Magical
 */
trait CallStatic
{
    public static function __callStatic($name, $arguments)
    {
        $instance = new static();
        if (method_exists($instance, $name)) {
            $instance->$name(...$arguments);
        }
    }
}
