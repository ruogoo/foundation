<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Traits;

use Closure;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;

/**
 * A trait provide some simple methods to make validation.
 * Class MoreValidator
 * @namespace Ruogu\Foundation\Traits
 */
Trait MoreValidator
{
    /** @var Validator */
    private $validator;

    /**
     * Validating a request with rules.
     * @param \Illuminate\Http\Request $request
     * @param array                    $rules
     * @return $this
     */
    protected function validating(Request $request, array $rules)
    {
        $this->validator = app('validator')->make($request->all(), $rules);

        return $this;
    }

    /**
     * Check the previous validation passed. If passed, the $closure will be execute.
     * @param Closure $closure
     * @return $this
     */
    protected function passed(Closure $closure)
    {
        if (is_not_null($closure) && ! $this->validator->fails()) {
            $closure($this->validator);
        }

        return $this;
    }

    /**
     * Check the previous validation failed. If failed, the $closure will be execute.
     * @param Closure $closure
     * @return $this
     */
    protected function failed(Closure $closure)
    {
        if (is_not_null($closure) && $this->validator->fails()) {
            $closure($this->validator);
        }

        return $this;
    }
}
