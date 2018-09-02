<?php
/**
 * This file is part of ruogu.
 *
 * Created by HyanCat.
 *
 * Copyright (C) HyanCat. All rights reserved.
 */

namespace Ruogu\Foundation\Error;

/**
 * Class Error
 * 标准错误类.
 */
class Error
{
    private $code;
    private $message;
    private $type;
    private $option;

    public function __construct($code, $message = '', $option)
    {
        $this->code    = $code;
        $this->message = $message;
        $this->option  = $option;

        if (null === $option) {
            // 如果不指定 option, 则推断为 json 或 string
            $this->type = is_array($this->message) ? ErrorType::JSON : ErrorType::STRING;
        } else {
            $this->type = in_array($option, [
                ErrorType::JSON,
                ErrorType::STRING,
                ErrorType::VIEW,
            ], true) ? $option : ErrorType::JSONP;
        }
    }

    public function show()
    {
        switch ($this->type) {
            case ErrorType::JSON:
            case ErrorType::STRING:
            case ErrorType::VIEW:
                return \Response::json([
                    'error'   => $this->code,
                    'message' => $this->message,
                    'type'    => $this->type,
                ]);
            case ErrorType::JSONP:
                return \Response::jsonp($this->option, [
                    'error'   => $this->code,
                    'message' => $this->message,
                ]);
            default:
                return response('error', 500);
        }
    }
}
