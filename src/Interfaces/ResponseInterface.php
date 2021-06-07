<?php

namespace SendicaApi\Interfaces;

interface ResponseInterface
{
    public function handleResponse();

    /** @return int */
    public function getStatus();
    /** @return string */
    public function getType();
    /** @return string */
    public function getMessage();
    /** @return mixed */
    public function getData();
}
