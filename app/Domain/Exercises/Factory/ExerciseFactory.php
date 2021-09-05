<?php

namespace App\Domain\Exercises\Factory;

use App\Domain\Exercises\Model\ExerciseInterface;
use App\Domain\Exercises\Model\ArticleExercise;

class ExerciseFactory
{
    public function createArticleExercise(string $rawString): ExerciseInterface
    {
        return new ArticleExercise($rawString);
    }
}
