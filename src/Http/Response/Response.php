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
 * Standard response for normal data.
 * Class Response
 * @namespace Ruogu\Foundation\Response
 */
class Response implements Arrayable, Jsonable
{
    protected $data;
    protected $code;

    public function __construct(\ArrayAccess $data, int $code = 200)
    {
        $this->data = $data;
        $this->code = $code;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getCode(): int
    {
        return $this->code;
    }

    public function toArray()
    {
        return $this->data;
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }
}
