<?php

namespace Dst\dao;

use JMS\Serializer\ArrayTransformerInterface;
use PDO;

abstract class BaseDao
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * @var ArrayTransformerInterface
     */
    private $arrayTransformer;

    /**
     * @param PDO $connection
     * @param ArrayTransformerInterface $arrayTransformer
     */
    public function __construct(PDO $connection, ArrayTransformerInterface $arrayTransformer)
    {
        $this->connection = $connection;
        $this->arrayTransformer = $arrayTransformer;
    }

    /**
     * @return PDO
     */
    final protected function getConnection(): PDO
    {
        return $this->connection;
    }

    /**
     * @return ArrayTransformerInterface
     */
    final protected function getArrayTransformer(): ArrayTransformerInterface
    {
        return $this->arrayTransformer;
    }
}