<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Http\Request;

trait ListRequest
{
    protected function listRequest(): ListParam
    {
        $request = request();

        $listParam = new ListParam($request);

        return $listParam;
    }
}
