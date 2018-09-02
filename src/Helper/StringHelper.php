<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Helper;

class StringHelper
{
    /**
     * 移除特殊符号.
     *
     * @param $str
     *
     * @return mixed
     */
    public static function removeSpecialCharacters(string $str): string
    {
        $string   = $str;
        $searches = [' ', "\t", "\n", "\r", '?', '#', '!', '&', "'", '"', '@', '/', '<', '>'];
        foreach ($searches as $search) {
            $string = str_replace($search, '', $string);
        }

        return $string;
    }
}
