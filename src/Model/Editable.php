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
 * Interface Editable
 * @namespace Ruogu\Foundation\Models
 */
interface Editable extends Creatable
{
    /**
     * Give a unique key for the object.
     * @return string
     */
    public function getEditableKey(): string;
}
