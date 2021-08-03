<?php


namespace App\Components\RandomQuote;


use App\Domain\Content\Contracts\ContentProviderInterface;

class RandomQuoteGenerator implements ContentProviderInterface
{

    private RandomQuoteService $quoteService;
    private RandomQuoteParser $parser;

    public function __construct(RandomQuoteService $quoteService, RandomQuoteParser $parser)
    {
        $this->quoteService = $quoteService;
        $this->parser = $parser;
    }

    public function getOneSentence(): string
    {
        $quote = $this->getAQuote();
        return $this->parser->getFirstSentence($quote);
    }

    public function getAQuote(): string
    {
        return $this->quoteService->fetchAQuoteWithTheAuthor();
    }

    public function getAQuoteByTag(string $tag): string
    {
        return $this->quoteService->fetchAQuoteByTag($tag);
    }

}
