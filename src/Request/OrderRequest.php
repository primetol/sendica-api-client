<?php

namespace SendicaApi\Request;

use SendicaApi\Model\Interfaces\ModelInterface;
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

    public function collection()
    {
        $result = $this->client->request('GET', '/orders', []);

        return new OrderResponse($result);
    }

    public function post(ModelInterface $model)
    {
        $result = $this->client->request('POST', '/orders', $model->toArray());
    }
}
