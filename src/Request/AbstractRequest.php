<?php

namespace SendicaApi\Request;

use SendicaApi\Client;
use SendicaApi\Exception\NotImplementedException;
use SendicaApi\Interfaces\RequestInterface;
use SendicaApi\Model\Interfaces\ModelInterface;

abstract class AbstractRequest implements RequestInterface
{
    /** @var Client */
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function get($identifier = null)
    {
        throw new NotImplementedException;
    }

    public function post(ModelInterface $model)
    {
        throw new NotImplementedException;
    }

    public function patch($identifier, ModelInterface $model)
    {
        throw new NotImplementedException;
    }
}
