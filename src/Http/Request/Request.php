<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Http\Request;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Ruogu\Foundation\Http\Exceptions\HttpException;

abstract class Request extends FormRequest
{
    abstract public function availableFields(): array;

    abstract public function rules(): array;

    /**
     * 是否需要 auth.
     * @var bool
     */
    protected $auth = false;

    public function authorize()
    {
        // 提供一个基本的 auth 检查
        if ($this->auth) {
            return is_not_null(\Auth::id());
        }

        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpException(422, '参数错误');
    }

}
