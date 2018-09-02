<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Helper;

class DateHelper
{
    /**
     * 日期转化函数.
     *
     * @param $date
     *
     * @return bool|string
     */
    public static function semanticDate($date)
    {
        $time = strtotime($date);

        return self::semanticTime($time);
    }

    /**
     * UNIX时间戳转化函数（需持续完善）.
     *
     * @param $time
     *
     * @return bool|string
     */
    public static function semanticTime($time)
    {
        $delta = time() - $time;
        if ($delta < 0) {
            return 'error';
        }
        if ($delta < 60) {
            return $delta.'秒前';
        }
        if ($delta < 60 * 60) {
            return intval($delta / 60).'分钟前';
        }
        if ($delta < 24 * 60 * 60) {
            return intval($delta / (60 * 60)).'小时前';
        }
        if ($delta < 4 * 24 * 60 * 60) {
            return intval($delta / (24 * 60 * 60)).'天前';
        }
        if (date('Y', $time) == date('Y', time())) {
            return date('m月d日', $time);
        }

        return date('Y年m月d日', $time);
    }
}
