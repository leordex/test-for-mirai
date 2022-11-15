<?php

namespace Dst\repositories;

use PDO;

abstract class BaseRepository
{
    /**
     * @var PDO
     */
    private $connection;

    /**
     * @param PDO $connection
     */
    public function __construct(PDO $connection)
    {
        $this->connection = $connection;
    }

    /**
     * @return PDO
     */
    final protected function getConnection(): PDO
    {
        return $this->connection;
    }
}