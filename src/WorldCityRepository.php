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
}
