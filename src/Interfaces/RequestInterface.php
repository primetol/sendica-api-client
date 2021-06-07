<?php

namespace SendicaApi\Interfaces;

use SendicaApi\Model\Interfaces\ModelInterface;

interface RequestInterface
{
    /**
     * @var ModelInterface|ModelInterface[]
     */
    public function get($identifier = null);

    /**
     * @param ModelInterface $model
     *
     * @return self
     */
    public function post(ModelInterface $model);

    /**
     * @param int|string     $identifier
     * @param ModelInterface $model
     *
     * @return self
     */
    public function patch($identifier, ModelInterface $model);
}
