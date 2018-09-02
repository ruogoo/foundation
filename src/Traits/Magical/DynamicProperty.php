<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Traits\Magical;

use Illuminate\Support\Arr;

/**
 * 给类增加动态属性
 * trait DynamicProperty
 * @namespace Ruogu\Foundation
 */
trait DynamicProperty
{
    protected $properties;

    public function __get($name)
    {
        return Arr::get($this->properties, $name);
    }

    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }

    public function __isset($name)
    {
        return Arr::has($this->properties, $name);
    }
}
