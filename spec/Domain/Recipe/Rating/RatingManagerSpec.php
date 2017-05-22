<?php

namespace spec\Domain\Recipe\Rating;

use Application\Repository\RatingRepository;
use Application\Repository\RecipeRepository;
use Domain\Recipe\Rating\RatingManager;
use PhpSpec\ObjectBehavior;

class RatingManagerSpec extends ObjectBehavior
{
    function let(RecipeRepository $recipeRepository, RatingRepository $ratingRepository)
    {
        $this->beConstructedWith($recipeRepository, $ratingRepository);
    }

    function it_bubbles_exception_if_rating_not_in_range(RecipeRepository $recipeRepository)
    {
        $recipeRepository->fetchById(1)->willReturn(['id' => 1]);
        $this->shouldThrow(new \Exception('Rating should be between 1 to 5'))->duringAddRating(1, 6);
    }

    function it_create_rating_for_recipe(RecipeRepository $recipeRepository, RatingRepository $ratingRepository)
    {
        $recipeRepository->fetchById(1)->willReturn(['id' => 1]);
        $ratingRepository->add(1, 4)->willReturn(true);
        $this->addRating(1, 4)->shouldReturn(true);
    }
}
