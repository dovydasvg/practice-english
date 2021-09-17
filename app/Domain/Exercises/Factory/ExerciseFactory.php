<?php

namespace App\Domain\Exercises\Factory;

use App\Domain\Exercises\Model\AbstractExercise;
use App\Domain\Exercises\Model\ArticleAbstractExercise;

class ExerciseFactory
{
    public function createArticleExercise(string $rawString): AbstractExercise
    {
        return new ArticleAbstractExercise($rawString);
    }
}
