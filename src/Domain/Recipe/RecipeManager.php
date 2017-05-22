<?php

namespace Domain\Recipe;

use Exception;

class RecipeManager
{
    /**
     * @var RecipeRepositoryInterface
     */
    private $recipeRepository;

    /**
     * RecipeManager constructor.
     * @param RecipeRepositoryInterface $recipeRepository
     */
    public function __construct(RecipeRepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    public function create(array $recipeDetails)
    {
        if (!$recipeDetails['title'] || !$recipeDetails['title']) {
            throw  new Exception('Please provide necessary details');
        }

        return $this->recipeRepository->add($recipeDetails);
    }

    public function update(int $id, array $recipeDetails)
    {
        if (empty($this->recipeRepository->fetchById($id))) {
            throw new Exception('Recipe not found!');
        }

        return $this->recipeRepository->update($id, $recipeDetails);
    }
}
