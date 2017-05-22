<?php

use Application\Repository\RecipeRepository;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Domain\Recipe\Recipe;
use Domain\Recipe\RecipeLister;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $response;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given A recipe with id :id and title :title
     */
    public function aRecipeWithIdAndTitle(int $id, string $title)
    {
        Recipe::withIdAndTitle($id, $title);
    }

    /**
     * @When I look for recipe for id :id
     */
    public function iLookForRecipeForId(int $id)
    {
        $recipeLister = new RecipeLister(new RecipeRepository());
        $this->response = $recipeLister->listById($id);
    }

    /**
     * @Then Recipe with below data will be returned:
     */
    public function recipeWithBelowDataWillBeReturned(TableNode $table)
    {
        $column = $table->getColumnsHash();
        PHPUnit_Framework_Assert::assertContains($column[0]['title'], $this->response);
        PHPUnit_Framework_Assert::assertContains($column[0]['id'], $this->response);
        PHPUnit_Framework_Assert::assertContains($column[0]['cuisine'], $this->response);
    }

    /**
     * @Given Recipe belongs to :arg1 cuisine
     */
    public function recipeBelongsToCuisine($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I look for recipe belongs to :arg1 cuisine
     */
    public function iLookForRecipeBelongsToCuisine($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then All recipes with indian cuisine will be returned
     */
    public function allRecipesWithIndianCuisineWillBeReturned()
    {
        throw new PendingException();
    }

    /**
     * @Given A recipe with id :arg1 and title = :arg2
     */
    public function aRecipeWithIdAndTitle2($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @When Someone gives rating between :arg1 to :arg2
     */
    public function someoneGivesRatingBetweenTo($arg1, $arg2)
    {
        throw new PendingException();
    }

    /**
     * @Then Rating should be added for that recipe
     */
    public function ratingShouldBeAddedForThatRecipe()
    {
        throw new PendingException();
    }

    /**
     * @When I change title to :arg1
     */
    public function iChangeTitleTo($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Given A recipe with title :arg1
     */
    public function aRecipeWithTitle($arg1)
    {
        throw new PendingException();
    }

    /**
     * @When I create recipe record
     */
    public function iCreateRecipeRecord()
    {
        throw new PendingException();
    }

    /**
     * @Then Recipe should be created
     */
    public function recipeShouldBeCreated()
    {
        throw new PendingException();
    }
}
