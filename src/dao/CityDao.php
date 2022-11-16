<?php

namespace Dst\dao;

use Dst\dao\dto\CityDto;
use Dst\entities\City;
use PDO;
use PDOException;

class CityDao extends BaseDao
{
    /**
     * @param string $id
     *
     * @return City
     * @throws PDOException
     */
    public function get(string $id): CityDto
    {
        $query = <<<SQL
            SELECT * FROM city WHERE id = :id;
SQL;

        $statement = $this->getConnection()->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->execute();

        return $this->getArrayTransformer()->fromArray(
            $statement->fetch(PDO::FETCH_ASSOC),
            CityDto::class
        );
    }
}