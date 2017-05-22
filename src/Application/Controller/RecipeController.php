<?php

namespace Application\Controller;

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

    public function getRecipeById()
    {

    }

    public function getRecipesByCuisine()
    {

    }

    public function rateRecipe()
    {

    }

    public function updateRecipe()
    {

    }

    public function addRecipe()
    {

    }

}