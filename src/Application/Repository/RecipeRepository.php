<?php

namespace Application\Repository;

use Domain\Recipe\Recipe;
use Domain\Recipe\RecipeRepositoryInterface;

class RecipeRepository implements RecipeRepositoryInterface
{
    const FIELD_ID = 0;
    const FIELD_TITLE = 4;
    const FIELD_CUISINE = 23;

    private $dataFile;

    public function __construct()
    {
        $this->dataFile = __DIR__ .'/../../../recipe-data.csv';
    }

    public function fetchById(int $id)
    {
        $data = file($this->dataFile);
        foreach ($data as $line) {
            $data = str_getcsv($line);
            if ($data[static::FIELD_ID] == $id) {
                return $data;
            }
        }
    }

    public function add(array $recipe)
    {
        $handle = fopen($this->dataFile , "a");
        $recipeLine = [];
        $recipeLine[static::FIELD_ID] = rand();
        $recipeLine[static::FIELD_TITLE] = $recipe['title'];
        $recipeLine[static::FIELD_CUISINE] = $recipe['cuisine'];
        fputcsv($handle, $recipe);
        fclose($handle);

        return $recipeLine[static::FIELD_ID];
    }

    public function fetchByCuisine(string $cuisine)
    {
        $response = [];
        $data = file($this->dataFile);
        foreach ($data as $line) {
            $data = str_getcsv($line);
            if (isset($data[static::FIELD_CUISINE]) && $data[static::FIELD_CUISINE] === $cuisine) {
                $response[] = $data;
            }
        }

        return $response;
    }

    public function update(int $id, array $data)
    {
        return $id;
    }
}