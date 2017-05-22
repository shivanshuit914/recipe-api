<?php

namespace spec\Domain\Recipe;

use Application\Repository\RecipeRepository;
use Domain\Recipe\Recipe;
use Domain\Recipe\RecipeManager;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RecipeManagerSpec extends ObjectBehavior
{
    function let(RecipeRepository $recipeRepository)
    {
        $this->beConstructedWith($recipeRepository);
    }

    function it_creates_recipe(RecipeRepository $recipeRepository)
    {
        $recipe = Recipe::withIdAndTitle(22, 'my new recipe');
        $recipe->belongsTo('asian');
        $recipeRepository->add(['title' => 'my new recipe', 'cuisine' => 'asian'])->willReturn($recipe);
        $this->create(['title' => 'my new recipe', 'cuisine' => 'asian'])->shouldReturn($recipe);
    }

    function it_updates_recipe()
    {

    }
}
