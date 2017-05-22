<?php

namespace Domain\Recipe;

use Exception;

class RecipeLister
{
    /**
     * @var RecipeRepositoryInterface
     */
    private $recipeRepository;

    /**
     * RecipeLister constructor.
     * @param RecipeRepositoryInterface $recipeRepository
     */
    public function __construct(RecipeRepositoryInterface $recipeRepository)
    {
        $this->recipeRepository = $recipeRepository;
    }

    /**
     * @param int $id
     * @return mixed
     * @throws Exception
     */
    public function listById(int $id)
    {
        $result = $this->recipeRepository->fetchById($id);
        if (empty($result)) {
            throw new Exception('No recipe found for id : '. $id);
        }

        return $result;
    }
}
