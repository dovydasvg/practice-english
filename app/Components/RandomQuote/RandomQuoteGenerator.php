<?php


namespace App\Components\RandomQuote;


use App\Domain\Content\Contracts\ContentProviderInterface;

class RandomQuoteGenerator implements ContentProviderInterface
{

    private RandomQuoteService $quoteService;

    public function __construct(RandomQuoteService $quoteService)
    {
        $this->quoteService = $quoteService;
    }

    public function getOneSentence(): string
    {
        return "This is a quote.";
    }

}
