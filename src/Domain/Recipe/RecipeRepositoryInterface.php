<?php

namespace Domain\Recipe;


interface RecipeRepositoryInterface
{
    public function fetchById(int $id);

    public function add(array $recipe);

    public function fetchByCuisine(string $cuisine);

    public function update(int $id, array $data);
}