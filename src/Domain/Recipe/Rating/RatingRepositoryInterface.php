<?php

namespace Domain\Recipe\Rating;

interface RatingRepositoryInterface
{
    public function add(int $recipeId, int $rating);
}