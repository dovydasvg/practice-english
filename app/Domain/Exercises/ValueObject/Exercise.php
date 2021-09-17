<?php

namespace App\Domain\Exercises\ValueObject;

class Exercise
{
    private array $answers;
    private string $withAnswers;
    private string $withoutAnswers;

    public function __construct(string $withAnswers, string $withoutAnswers,array $answers)
    {
        $this->answers = $answers;
        $this->withAnswers = $withAnswers;
        $this->withoutAnswers = $withoutAnswers;
    }

    /**
     * @return array
     */
    public function getAnswers(): array
    {
        return $this->answers;
    }

    /**
     * @return string
     */
    public function getWithAnswers(): string
    {
        return $this->withAnswers;
    }

    /**
     * @return string
     */
    public function getWithoutAnswers(): string
    {
        return $this->withoutAnswers;
    }

}
