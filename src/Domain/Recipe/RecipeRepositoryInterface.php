<?php

namespace Domain\Recipe;


interface RecipeRepositoryInterface
{
    public function fetchById(int $id);

    public function add(Recipe $recipe);

    public function fetchByCuisine(string $cuisine);
}