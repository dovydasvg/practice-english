<?php

namespace App\Domain\Exercises\Model;

use App\Domain\Exercises\ValueObject\Exercise;

class ArticleAbstractExercise extends AbstractExercise
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
        preg_match_all('/ (a|an|the) /im', $rawString, $answers);
        $output_array = $this->trimAnswers($answers);
        return new Exercise($rawString, $withoutAnswers, $output_array);
    }

    /**
     * @param array $answers
     * @return array
     */
    protected function trimAnswers(array $answers): array
    {
        if(!empty($answers[0])) {
            array_walk($answers, function (&$value) {

                $value = trim($value[0]);
            });
        }
        return $answers;
    }
}
