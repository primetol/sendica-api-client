<?php

namespace SendicaApi\Request;

use SendicaApi\Response\StringResponse;

class GreetingRequest extends AbstractRequest
{
    private $endpoint = '/greeting';

    /**
     * @param null $identifier
     */
    public function get($identifier = null)
    {
        $result = $this->client->request('GET', $this->endpoint, []);

        return new StringResponse($result);
    }
}
