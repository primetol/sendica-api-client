<?php


namespace SendicaApi\Response;

/**
 * @method string getData()
 */
class StringResponse extends AbstractResponse
{
    public function handleResponse()
    {
        if ($this->type === 'string') {
            $this->data = $this->response['data'];
        }
    }
}
