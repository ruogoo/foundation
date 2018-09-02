<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Http\Request;

trait PageRequest
{
    protected function pageRequest(): PageParam
    {
        $request = request();

        $pageParam = new PageParam($request);

        return $pageParam;
    }
}
