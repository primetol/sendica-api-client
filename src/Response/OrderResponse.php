<?php

namespace SendicaApi\Response;

use SendicaApi\Model\Order;

class OrderResponse extends AbstractResponse
{
    public function handleResponse()
    {
        if ($this->type === 'order') {
            $this->data = new Order($this->response['data']);
        }
    }
}
