<?php

namespace SendicaApi\Exception;

use RuntimeException;
use Exception;

class NotImplementedException extends RuntimeException
{
    public function __construct($message = 'Be careful, this method requires implementation', $code = 0, Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
