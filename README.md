# Recipe REST API example 
    
    composer install // to load depenencies
    composer start   // to start in built server
    
    // API end point recipe by id
    GET http://0.0.0.0:8080/v1/recipe/1
    
    // Recipes by cuisine
    GET http://0.0.0.0:8080/v1/recipes/cuisine/asian/limit/2
    
    POST http://0.0.0.0:8080/v1/recipe/
    "recipe": {
        "title": "my new recipe",
        "cuisine": "asian",
    }