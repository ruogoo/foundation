<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Traits;

/**
 * Trait Increment
 * 提供链式增长属性的特性
 * @package Ruogu\Foundation\Traits
 */
trait Increment
{
    /**
     * 链式增长方法.
     * @param string $property
     * @param int    $step
     * @return $this
     */
    public function increase(string $property, $step = 1)
    {
        $limitedStep = $this->checkStepLimited($property, $step);
        $this->$property += $limitedStep;

        return $this;
    }

    /**
     * 无视限制，强制增长
     * @param string $property
     * @param int    $step
     * @return $this
     */
    public function increaseIgnoreLimit(string $property, $step = 1)
    {
        $this->$property += $step;

        return $this;
    }

    /**
     * 检查是否受到限制策略, 使用者按实际策略重写此方法.
     * @param string $property
     * @param int    $step
     * @return int $step
     */
    protected function checkStepLimited(string $property, $step = 1)
    {
        if (empty($property)) {
            return 0;
        }

        return $step;
    }
}