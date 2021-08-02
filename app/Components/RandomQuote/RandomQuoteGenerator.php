<?php


namespace App\Components\RandomQuote;


use App\Domain\Content\Contracts\ContentProviderInterface;

class RandomQuoteGenerator implements ContentProviderInterface
{

    public function getOneSentence(): string
    {
        return "This is one great sentence.";
    }

}
