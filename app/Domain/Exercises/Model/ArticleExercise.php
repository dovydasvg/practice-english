<?php

namespace App\Domain\Exercises\Model;

use App\Domain\Exercises\ValueObject\Exercise;

class ArticleExercise extends ExerciseInterface
{

    private Exercise $exercise;

    public function __construct(string $rawString)
    {
        $this->exercise = $this->createExercise($rawString);
    }

    /**
     * @return Exercise
     */
    public function getExercise(): Exercise
    {
        return $this->exercise;
    }


    protected function createExercise(string $rawString): Exercise
    {
        $withoutAnswers = preg_replace('/ (a|an|the) /im', ' ____ ', $rawString);
        preg_match_all('/ a|the /im', $rawString, $output_array);
        return new Exercise($rawString, $withoutAnswers, $output_array);
    }
}
