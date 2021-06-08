<?php

namespace SendicaApi\Interfaces;

use SendicaApi\Model\Interfaces\ModelInterface;

interface RequestInterface
{
    /**
     * @return ModelInterface
     */
    public function get($identifier);

    /**
     * @return ModelInterface[]
     */
    public function collection();

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
