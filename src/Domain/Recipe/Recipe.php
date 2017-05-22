<?php

namespace Domain\Recipe;

class Recipe
{
    /**
     * @var int
     */
    private $id;
    /**
     * @var string
     */
    private $title;

    /**
     * Recipe constructor.
     * @param int $id
     * @param string $title
     */
    private function __construct(int $id, string $title)
    {
        $this->id = $id;
        $this->title = $title;
    }

    /**
     * @param int $id
     * @param string $title
     * @return Recipe
     */
    public static function withIdAndTitle(int $id, string $title) : Recipe
    {
        return new static($id, $title);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }
}
