<?php

namespace SendicaApi\Response;

use SendicaApi\Model\Product;

/**
 * @method Product|Product[] getData()
 */
class ProductResponse extends AbstractResponse
{
    public function handleResponse()
    {
        if ($this->type === 'product') {
            $this->data = new Product($this->response['data']);
        }

        if ($this->type === 'product_pagination') {
            $this->data = array_map(function($o) { return new Product($o); }, $this->response['data']['list']);
        }
    }
}
