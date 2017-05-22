# Recipe REST API example 
    
    composer install // to load depenencies
    vendor/bin/phpspec run // to run unit tests
    vendor/bin/behat // to run behat scenarios
    composer start   // to start in built server
    
    // API end point recipe by id
    GET http://0.0.0.0:8080/v1/recipe/1
    
    // Recipes by cuisine
    GET http://0.0.0.0:8080/v1/recipes/cuisine/asian/limit/2
    
    // Create Recipe
    POST http://0.0.0.0:8080/v1/recipe/
    "recipe": {
        "title": "my new recipe",
        "cuisine": "asian",
    }
    
    // Update Recipe
    PUT http://0.0.0.0:8080/v1/recipe/1
    "recipe": {
        "title": "my new recipe title",
        "cuisine": "asian",
    }
    
    // Add rating for recipe
    POST http://0.0.0.0:8080/v1/recipe/rate
    "recipe_rating": {
        "id": "1",
        "rating": "3",
    }