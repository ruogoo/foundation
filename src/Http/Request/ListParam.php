<?php

namespace Ruogu\Foundation\Http\Request;

use Illuminate\Http\Request;

/**
 * [Class description]
 *
 * @category ruogu-community
 * @package  ruogu-community
 * @author   HyanCat <hyancat@live.cn>
 * @license  MIT https://github.com/HyanCat
 * @link     https://github.com/HyanCat/ruogu-community
 */
class ListParam
{
    public $from;
    public $to;
    public $count;
    public $field;
    public $order;

    public function __construct(Request $request)
    {
        $this->from  = (int) $request->get('from', 0);
        $this->to    = (int) $request->get('to', PHP_INT_MAX);
        $this->count = (int) $request->get('count', 10);
        $this->field = $request->get('field', 'id');
        $this->order = $request->get('order', 'desc');
    }
}
