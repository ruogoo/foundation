<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Helper;

use Illuminate\Http\Request;

class Parameter
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function intVal($field, $default = 0)
    {
        return (int)$this->request->get($field, $default);
    }

    public function strVal($field, $default = '')
    {
        return (string)$this->request->get($field, $default);
    }

    public function arrVal($field, array $default = [])
    {
        return is_array($data = $this->request->get($field)) ? $data : $default;
    }

    public function only(array $fields)
    {
        $data = [];
        foreach ($fields as $field) {
            // eg: name|string, age|int, recommend|bool
            // default string.
            $type = 'string';
            if (str_contains($field, '|')) {
                $pieces = explode('|', $field);
                $field  = $pieces[0];
                $type   = $pieces[1];
            }

            $value = $this->request->get($field);
            if (empty($value)) {
                continue;
            }
            switch ($type) {
                case 'string':
                    $value = (string)$value;
                    break;
                case 'int':
                case 'integer':
                    $value = (int)$value;
                    break;
                case 'bool':
                case 'boolean':
                    $value = (bool)$value;
                    break;
            }
            $data[$field] = $value;
        }

        return $data;
    }
}
