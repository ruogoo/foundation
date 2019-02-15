<?php
/**
 * This file is part of ruogu-community.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Models;

interface Hashable
{
    public function hashKey(): ?string;
}
