<?php

namespace SendicaApi\Response;

use SendicaApi\Interfaces\ResponseInterface;
use SendicaApi\Model\Interfaces\ModelInterface;

abstract class AbstractResponse implements ResponseInterface
{
    /** @var int */
    protected $status;
    /** @var string */
    protected $type;
    /** @var string */
    protected $message;

    /** @var ModelInterface */
    protected $one;
    /** @var ModelInterface[] */
    protected $list;
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

        $this->handleResponse();
    }

//    protected function handleCommonResponse()
//    {
//        // TODO array, string, float, integer, boolean response data
//    }

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
}
