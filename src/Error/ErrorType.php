<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Error;

interface ErrorType
{
    const JSON = 'json';
    const JSONP = 'jsonp';
    const STRING = 'string';
    const VIEW = 'view';
}
