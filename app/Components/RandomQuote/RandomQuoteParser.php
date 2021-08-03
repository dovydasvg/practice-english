<?php


namespace App\Components\RandomQuote;


class RandomQuoteParser
{
    public function getFirstSentence(string $fulltext): string
    {
        preg_match('/[A-Z].*?[.!?]/s', $fulltext,$one_sentence);
        return $one_sentence[0];
    }
}
