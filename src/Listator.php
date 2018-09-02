<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Support\Collection;

class Listator implements \ArrayAccess, \Countable, Arrayable, Jsonable, \Iterator
{
    /**
     * @var array|Collection
     */
    public $items;

    /**
     * @var int
     */
    public $total;

    public function __construct($items, int $total)
    {
        $this->items = $items;
        $this->total = $total;
    }

    public function items()
    {
        return $this->items;
    }

    public function toArray()
    {
        return [
            'count' => count($this->items),
            'total' => $this->total,
            'list'  => $this->items,
        ];
    }

    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    public function offsetGet($offset)
    {
        return $this->items[$offset];
    }

    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

    public function count()
    {
        return count($this->items);
    }

    public function toJson($options = 0)
    {
        return json_encode($this->toArray());
    }

    public function __toString()
    {
        return $this->toJson();
    }

    private $_index = 0;

    public function current()
    {
        return $this[$this->_index];
    }

    public function next()
    {
        $this->_index++;
        if ($this->valid()) {
            return $this[$this->_index];
        }

        return null;
    }

    public function key()
    {
        return $this->_index;
    }

    public function valid()
    {
        return $this->_index < $this->count();
    }

    public function rewind()
    {
        $this->_index = 0;
    }
}
