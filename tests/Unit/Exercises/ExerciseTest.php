<?php

namespace Tests\Unit\Exercises;

use App\Components\OpenAi\OpenAiServices;
use App\Components\OpenAi\OpenAiTextGenerator;
use App\Components\RandomQuote\RandomQuoteGenerator;
use App\Domain\Content\Contracts\ContentProviderInterface;
use App\Domain\Exercises\Factory\ExerciseFactory;
use Tests\TestCase;

class ExerciseTest extends TestCase
{

    private const ARTICLE_EXERCISE = 'This is ____ simple sentence with ____ simple task of creating ____ simple exercise in ____ elegant way.';
    const RAW_SENTENCE = 'This is a simple sentence with the simple task of creating a simple exercise in an elegant way.';
    private ExerciseFactory $ExerciseFactory;

    public function setUp(): void
    {
        parent::setUp();
        $this->ExerciseFactory = new ExerciseFactory;
    }

    public function test_that_exercises_can_create_article_exercise_from_string(): void
    {
        $exercise = $this->ExerciseFactory->createArticleExercise(self::RAW_SENTENCE)->getExercise();
        $exercise_sentence = $exercise->getWithoutAnswers();
        $this->assertEquals(self::ARTICLE_EXERCISE, $exercise_sentence);
    }
}
