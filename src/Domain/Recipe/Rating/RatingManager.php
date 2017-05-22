<?php

namespace Domain\Recipe\Rating;

use Domain\Recipe\RecipeRepositoryInterface;
use Exception;

class RatingManager
{
    /**
     * @var RecipeRepositoryInterface
     */
    private $recipeRepository;
    /**
     * @var RatingRepositoryInterface
     */
    private $ratingRepository;

    /**
     * RatingManager constructor.
     * @param RecipeRepositoryInterface $recipeRepository
     * @param RatingRepositoryInterface $ratingRepository
     */
    public function __construct(
        RecipeRepositoryInterface $recipeRepository,
        RatingRepositoryInterface $ratingRepository
    ) {
        $this->recipeRepository = $recipeRepository;
        $this->ratingRepository = $ratingRepository;
    }

    /**
     * @param int $recipeId
     * @param int $rating
     * @return mixed
     * @throws Exception
     */
    public function addRating(int $recipeId, int $rating)
    {
        if ($rating < 1 || $rating > 5) {
            throw new Exception('Rating should be between 1 to 5');
        }

        if (!$this->recipeRepository->fetchById($recipeId)) {
            throw new Exception('Recipe Not found');
        }

        return $this->ratingRepository->add($recipeId, $rating);
    }

}
