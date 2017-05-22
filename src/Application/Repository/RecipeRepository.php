<?php

namespace Application\Repository;

use Domain\Recipe\Recipe;
use Domain\Recipe\RecipeRepositoryInterface;

class RecipeRepository implements RecipeRepositoryInterface
{
    const FIELD_ID = 0;
    const FIELD_CUISINE = 23;

    private $dataFile;

    public function __construct()
    {
        $this->dataFile = file(__DIR__ .'/../../../recipe-data.csv');
    }

    public function fetchById(int $id)
    {
        foreach ($this->dataFile as $line) {
            $data = str_getcsv($line);
            if ($data[static::FIELD_ID] == $id) {
                return $data;
            }
        }
    }

    public function add(Recipe $recipe)
    {

    }

    public function fetchByCuisine(string $cuisine)
    {
        $response = [];
        foreach ($this->dataFile as $line) {
            $data = str_getcsv($line);
            if ($data[static::FIELD_CUISINE] === $cuisine) {
                $response[] = $data;
            }
        }

        return $response;
    }
}