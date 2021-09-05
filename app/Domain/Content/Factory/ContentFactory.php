<?php

namespace App\Domain\Content\Factory;

use App\Components\OpenAi\OpenAiServices;
use App\Components\OpenAi\OpenAiTextGenerator;
use App\Components\RandomQuote\RandomQuoteGenerator;
use App\Components\RandomQuote\RandomQuoteParser;
use App\Components\RandomQuote\RandomQuoteService;

class ContentFactory
{
    public function createRandomQuoteGenerator()
    {
        return new RandomQuoteGenerator(new RandomQuoteService(), new RandomQuoteParser());
    }

    public function createOpenAiTextGenerator()
    {
        return new OpenAiTextGenerator(new OpenAiServices());
    }
}
