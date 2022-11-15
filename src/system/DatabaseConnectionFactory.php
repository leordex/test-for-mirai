<?php

namespace Dst\system;

use PDO;

final class DatabaseConnectionFactory
{
    /**
     * @var mixed[]
     */
    private $config;

    /**
     * @param mixed[] $config
     */
    public function __construct(array $config)
    {
        $this->config = $config;
    }

    /**
     * @return PDO
     */
    public function create(): PDO
    {
        return new PDO(
            sprintf(
                'mysql:host=%s;port=%d;charset=utf8mb4;dbname=%s',
                $this->config['host'],
                $this->config['port'],
                $this->config['database']
            ),
            $this->config['username'],
            $this->config['password'],
            [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
        );
    }
}