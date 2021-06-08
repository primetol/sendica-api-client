<?php

namespace SendicaApi\Response;

use SendicaApi\Model\Order;

/**
 * @method Order|Order[] getData()
 */
class OrderResponse extends AbstractResponse
{
    public function handleResponse()
    {
        if ($this->type === 'order') {
            $this->data = new Order($this->response['data']);
        }

        if ($this->type === 'order_pagination') {
            $this->data = array_map(function($o) { return new Order($o); }, $this->response['data']['list']);
        }
    }
}
