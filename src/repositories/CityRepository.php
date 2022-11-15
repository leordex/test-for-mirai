<?php

namespace Dst\repositories;

use Dst\entities\City;
use PDO;
use PDOException;

class CityRepository extends BaseRepository
{
    /**
     * @param string $id
     *
     * @return City
     * @throws PDOException
     */
    public function find(string $id): City
    {
        $query = <<<SQL
            SELECT * FROM city WHERE id = :id;
SQL;

        $statement = $this->getConnection()->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();

        $city = new City();
        $statement->setFetchMode(PDO::FETCH_INTO, $city);

        return $statement->fetch();
    }
}