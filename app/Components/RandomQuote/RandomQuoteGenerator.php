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
        $quote = $this->getAQuote();
        preg_match('/[A-Z].*?[.!?]/s', $quote,$one_sentence);
        return $one_sentence[0];
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
