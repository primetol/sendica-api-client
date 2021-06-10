<?php


namespace SendicaApi\Response;

/**
 * @method string getData()
 */
class ErrorResponse extends AbstractResponse
{
    public function handleBadResponse()
    {
        $this->type = 'string';
        $this->data = $this->response['message'];
    }
}
