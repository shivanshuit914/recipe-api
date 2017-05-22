<?php

namespace Application\Controller;

use Application\Repository\RecipeRepository;
use Domain\Recipe\RecipeLister;
use Domain\Recipe\RecipeManager;
use Exception;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;


class RecipeController
{
    /**
     * @var ServerRequestInterface
     */
    private $request;
    /**
     * @var ResponseInterface
     */
    private $response;

    /**
     * RecipeController constructor.
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     */
    public function __construct(ServerRequestInterface $request, ResponseInterface $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function getRecipeById($request, $response,array $params)
    {
        try {
            $recipeLister = new RecipeLister(
                new RecipeRepository()
            );
            $recipeData = $recipeLister->listById((int)$params['id']);
            return $this->response->withJson([
                'success' => true,
                'message' => 'Recipe found',
                'recipeData' => $recipeData
            ], 200);
        } catch (Exception $exception) {
            return $this->response->withJson([
                'success' => false,
                'message' => $exception->getMessage()
            ], 200);
        }
    }

    public function getRecipesByCuisine($request, $response, array $params)
    {
        try {
            $recipeLister = new RecipeLister(
                new RecipeRepository()
            );
            $recipeData = $recipeLister->listByCuisine($params['cuisine']);
            return $this->response->withJson([
                'success' => true,
                'message' => 'Recipes found',
                'recipeData' => $recipeData
            ], 200);
        } catch (Exception $exception) {
            return $this->response->withJson([
                'success' => false,
                'message' => $exception->getMessage()
            ], 200);
        }
    }

    public function rateRecipe()
    {

    }

    public function updateRecipe()
    {

    }

    public function addRecipe()
    {
        try {
            $requestBody = $this->request->getParsedBody();
            $recipeManager = new RecipeManager(new RecipeRepository());
            $recipeManager->create($requestBody['recipe']);
            return $this->response->withJson([
                'success' => true,
                'message' => 'Recipe successfully added.'
            ], 200);
        } catch (Exception $exception) {
            return $this->response->withJson([
                'success' => false,
                'message' => $exception->getMessage()
            ], 200);
        }
    }

}