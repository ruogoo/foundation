<?php
/**
 * This file is part of ruogu-community.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Models;

use Vinkla\Hashids\Facades\Hashids;

trait HashId
{
    /**
     * 指定 hash 的 key
     * @return string|null
     */
    public function hashKey(): ?string
    {
        return 'id';
    }

    /**
     * 获取 hashId 属性
     * @return string|null
     */
    public function getHashIdAttribute(): ?string
    {
        $key = $this->hashKey();
        if ($key != null) {
            return hashid_encode($this->$key);
        }
        return null;
    }
}
