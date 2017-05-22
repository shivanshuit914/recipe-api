<?php

namespace Application\Repository;

use Domain\Recipe\Recipe;
use Domain\Recipe\RecipeRepositoryInterface;

class RecipeRepository implements RecipeRepositoryInterface
{
    private $dataFile;

    public function __construct()
    {
        $this->dataFile = file(__DIR__ .'/../../../recipe-data.csv');
    }

    public function fetchById(int $id)
    {
        foreach ($this->dataFile as $line) {
            $data = str_getcsv($line);
            if ($data[0] == $id) {
                return $data;
            }
        }
    }

    public function add(Recipe $recipe)
    {

    }
}