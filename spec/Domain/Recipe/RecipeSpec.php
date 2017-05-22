<?php

namespace spec\Domain\Recipe;

use Domain\Recipe\Recipe;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class RecipeSpec extends ObjectBehavior
{
    function let()
    {
        $this->beConstructedWithIdAndTitle(1, 'title');
    }

    function it_exposes_id()
    {
        $this->getId()->shouldReturn(1);
    }

    function it_exposes_title()
    {
        $this->getTitle()->shouldReturn('title');
    }

    function it_exposes_cuisine()
    {
        $this->belongsTo('asian');
        $this->getCuisine()->shouldReturn('asian');
    }
}
