<?php

declare(strict_types=1);

class WorldCityRepository
{
    public function __construct(private PDO $pdo) {}

    private function arrayToModel(array $entry) : WorldCityModel {
        return new WorldCityModel(
            $entry['id'],
            $entry['city'],
            $entry['city_ascii'],
            (float) $entry['lat'],
            (float) $entry['lng'],
            $entry['country'],
            $entry['iso2'],
            $entry['iso3'],
            $entry['admin_name'],
            $entry['capital'],
            $entry['population']
        );
    }

    public function fetch(): array
    {
        $stmt = $this->pdo->prepare("SELECT 
        `id`, `city`, `city_ascii`, `lat`, `lng`, `country`, `iso2`, `iso3`,`admin_name`, `capital`, `population`
       from `worldcities` 
       order by `population` DESC
       limit 10
       ");

        $stmt->execute();
        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $models = [];
        foreach ($entries as $entry) {
            $models[] = $this->arrayToModel($entry);
        }

        return $models;
    }

    public function fetchCityById($id): ?WorldCityModel
    {
        $stmt = $this->pdo->prepare(
            'SELECT  
        `id`, `city`, `city_ascii`, `lat`, `lng`, `country`, 
        `iso2`, `iso3`,`admin_name`, `capital`, `population` 
        FROM `worldcities` 
        WHERE id = :id'
        );
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $entry = $stmt->fetch(PDO::FETCH_ASSOC);

        $model = null;

        if ($entry) {
          $model = $this->arrayToModel($entry);
        }

        return $model;
    }

    public function updateCityById($id, $city) {
        $stmt = $this->pdo->prepare(
            'UPDATE `worldcities` 
            SET `city` = :city, 
            `city_ascii` = :cityAscii, 
            `country` = :country, 
            `iso2` = :iso2, 
            `population` = :population 
            WHERE id = :id'
        );

        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':city', $city['city'], PDO::PARAM_STR);
        $stmt->bindValue(':cityAscii', $city['cityAscii'], PDO::PARAM_STR);
        $stmt->bindValue(':country', $city['country'], PDO::PARAM_STR);
        $stmt->bindValue(':iso2', $city['iso2'], PDO::PARAM_STR);
        $stmt->bindValue(':population', $city['population'], PDO::PARAM_INT);

        $stmt->execute();

        return $this->fetchCityById($id);
    }

    public function count() : int  {
        $stmt = $this->pdo->prepare('SELECT COUNT(*) as count FROM `worldcities`');
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC)['count'];
    }

    public function paginate($page, $perPage) : array {
        $offset = ($page - 1) * $perPage;
        $stmt = $this->pdo->prepare(
            'SELECT  
        `id`, `city`, `city_ascii`, `lat`, `lng`, `country`, 
        `iso2`, `iso3`,`admin_name`, `capital`, `population` 
        FROM `worldcities` 
        ORDER BY `population` DESC
        LIMIT :perPage OFFSET :offset'
        );
        $stmt->bindValue(':perPage', $perPage, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $models = [];
        foreach ($entries as $entry) {
            $models[] = $this->arrayToModel($entry);
        }

        return $models;
    }
}
