<?php

namespace App\Http\Controllers;


use App\Domain\Content\Contracts\ContentProviderInterface;
use App\Domain\Exercises\Factory\ExerciseFactory;
use http\Env\Response;
use Illuminate\Http\Request;

class ExercisesController extends Controller
{
    public function showRandomArticleExercise(ContentProviderInterface $generator, ExerciseFactory $exerciseFactory)
    {
        $content = $generator->getRandomContent();
        $exercise = $exerciseFactory->createArticleExercise($content)->getExercise();
        $answers = $exercise->getAnswers();
        return response()->json([
            'answers' => $exercise->getAnswers(),
            'withoutAnswers' => $exercise->getWithoutAnswers(),
            'withAnswers' => $exercise->getWithAnswers()
        ]);
    }
}
