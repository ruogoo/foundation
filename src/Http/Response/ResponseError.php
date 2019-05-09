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
use Psr\Http\Message\ResponseInterface;

/**
 * Standard error response.
 * Class ResponseError
 * @namespace Ruogu\Foundation\Response
 */
class ResponseError implements Arrayable, Jsonable, ResponseInterface
{
    protected $code;
    protected $message;

    public function __construct(int $code, string $message)
    {
        $this->code = $code;
        $this->message = $message;
    }

    /**
     * @return int
     * @deprecated
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @return string
     * @deprecated
     */
    public function getMessage()
    {
        return $this->message;
    }

    public function getStatusCode()
    {
        return $this->code;
    }

    public function withStatus($code, $reasonPhrase = '')
    {
        $new = clone $this;
        $new->code = $code;
        $new->message = $reasonPhrase;
        return $new;
    }

    public function getReasonPhrase()
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
