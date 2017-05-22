<?php
// Routes
$app->group('/v1', function () {
    $this->post('/recipe/', 'RecipeController:addRecipe');
    $this->put('/recipe/{id}', 'RecipeController:updateRecipe');
    $this->get('/recipe/{id}', 'RecipeController:getRecipeById');
    $this->get('/recipes/cuisine/{name}/limit/{number}', 'RecipeController:getRecipesByCuisine');
    $this->post('/recipe/rate', 'RecipeController:rateRecipe');
});