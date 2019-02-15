<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Models;

/**
 * Interface Creatable
 * @namespace Ruogu\Foundation\Models
 */
interface Creatable
{
    /**
     * Create this instance with an array data.
     * @param array $data
     * @return mixed
     */
    public function createWithData(array $data);

    /**
     * Get the creating data.
     * @return array
     */
    public function getData(): array;
}
