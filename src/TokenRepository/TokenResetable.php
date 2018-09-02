<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\TokenRepository;

/**
 * Interface TokenResetable
 * 可以重置 token 的接口
 * @see     TokenRepositoryInterface
 * @package Ruogu\Repositories\TokenRepository
 */
interface TokenResetable
{
    public function tokenKey();
}
