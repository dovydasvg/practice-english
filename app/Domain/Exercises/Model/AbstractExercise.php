<?php

namespace App\Domain\Exercises\Model;

use App\Domain\Exercises\ValueObject\Exercise;

abstract class AbstractExercise
{
    public const EXERCISE_PLACEHOLDER = '____';
    abstract public function getExercise(): Exercise;
    abstract protected function createExercise(string $rawString): Exercise;
}
