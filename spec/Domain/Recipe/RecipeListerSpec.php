<?php

namespace spec\Domain\Recipe;

use Application\Repository\RecipeRepository;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RecipeListerSpec extends ObjectBehavior
{
    function let(RecipeRepository $recipeRepository)
    {
        $this->beConstructedWith($recipeRepository);
    }

    function it_lists_recipe_by_id(RecipeRepository $recipeRepository)
    {
        $recipeRepository->fetchById(1)->willReturn(['id' => 1]);
        $this->listById(1)->shouldHaveCount(1);
    }

    function it_lists_recipes_by_cuisine(RecipeRepository $recipeRepository)
    {
        $return = [
            ['id' => 1 , 'title' => 'recipe 1', 'cuisine' => 'asian'],
            ['id' => 2 , 'title' => 'recipe 2', 'cuisine' => 'asian'],
        ];
        $recipeRepository->fetchByCuisine('asian')->willReturn($return);
        $this->listByCuisine('asian')->shouldHaveCount(2);
    }
}
