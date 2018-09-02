<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Http\Response;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;

/**
 * Standard error response.
 * Class ResponseError
 * @namespace Ruogu\Foundation\Response
 */
class ResponseError implements Arrayable, Jsonable
{
    protected $code;
    protected $message;

    public function __construct(int $code, string $message)
    {
        $this->code    = $code;
        $this->message = $message;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function toArray(): array
    {
        return [
            'code'    => $this->code,
            'message' => $this->message,
        ];
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray(), $options);
    }
}
