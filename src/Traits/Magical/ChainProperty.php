<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Traits\Magical;

trait ChainProperty
{
    public function __call($name, $arguments)
    {
        if (property_exists($this, $name)) {
            if (count($arguments) === 0) {
                return $this->$name;
            }
            $this->$name = $arguments[0];

            return $this;
        }
    }
}
