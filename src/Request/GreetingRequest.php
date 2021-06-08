<?php

namespace SendicaApi\Request;

use SendicaApi\Response\StringResponse;

/**
 * @method string getData()
 */
class GreetingRequest extends AbstractRequest
{
    /**
     * @return StringResponse
     */
    public function greeting()
    {
        $result = $this->client->request('GET', '/greeting', []);

        return new StringResponse($result);
    }
}
