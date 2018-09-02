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
class PageParam
{
    public $page;
    public $count;
    public $field;
    public $order;

    public function __construct(Request $request)
    {
        $this->page  = (int) $request->get('page', 0);
        $this->count = (int) $request->get('count', 10);
        $this->field = $request->get('field', 'id');
        $this->order = $request->get('order', 'desc');
    }
}
