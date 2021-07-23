<?php

namespace SendicaApi\Request;

use SendicaApi\Model\Interfaces\ModelInterface;
use SendicaApi\Response\EmptyResponse;
use SendicaApi\Response\ProductResponse;

class ProductRequest extends AbstractRequest
{
    /**
     * @param int $identifier
     */
    public function get($identifier)
    {
        $result = $this->client->request('GET', '/products/' . $identifier, []);

        return new ProductResponse($result);
    }

    public function collection()
    {
        $result = $this->client->request('GET', '/products', []);

        return new ProductResponse($result);
    }

    public function post(ModelInterface $model)
    {
        $result = $this->client->request('POST', '/products', $model->toArray());

        return new ProductResponse($result);
    }

    public function patch($identifier, ModelInterface $model)
    {
        $result = $this->client->request('PATCH', '/products/' . $identifier, $model->toArray());

        return new EmptyResponse($result ?: []);
    }
}
