<?php

namespace SendicaApi\Response;

use SendicaApi\Interfaces\ResponseInterface;

abstract class AbstractResponse implements ResponseInterface
{
    /** @var int */
    protected $status;
    /** @var string */
    protected $type;
    /** @var string */
    protected $message;

    /** @var array */
    protected $response;
    /** @var mixed */
    protected $data;

    /**
     * @param array $response
     */
    public function __construct(array $response)
    {
        $this->response = $response;
        $this->status = $response['status'];
        $this->type = $response['type'];
        $this->message = $response['message'];

        if ($this->status >= 200 && $this->status < 400) {
            $this->handleResponse();
        } else {
            $this->handleBadResponse();
        }
    }

    public function handleResponse()
    {

    }

    public function handleBadResponse()
    {

    }

    public function getStatus()
    {
        return $this->status;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function getData()
    {
        return $this->data;
    }

    public function getResponse()
    {
        return $this->response;
    }
}
