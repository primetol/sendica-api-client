<?php

namespace SendicaApi\Request;

use SendicaApi\Response\OrderResponse;

class OrderRequest extends AbstractRequest
{
    /**
     * @param int $identifier
     */
    public function get($identifier)
    {
        $result = $this->client->request('GET', '/orders/' . $identifier, []);

        return new OrderResponse($result);
    }
}
