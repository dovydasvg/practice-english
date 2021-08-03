<?php

namespace Tests\Unit\RawContent;

use App\Components\RandomQuote\RandomQuoteParser;
use App\Components\RandomQuote\RandomQuoteService;
use App\Domain\Content\Contracts\ContentProviderInterface;
use PHPUnit\Framework\TestCase;
use App\Components\RandomQuote\RandomQuoteGenerator;

class RandomQuoteTest extends TestCase
{
    /**
     * @var RandomQuoteGenerator
     */
    private RandomQuoteGenerator $RandomQuoteGenerator;
    private RandomQuoteService $RandomQuoteService;
    private RandomQuoteParser $RandomQuoteParser;

    public function setUp(): void
    {
        $this->RandomQuoteService = new RandomQuoteService();
        $this->RandomQuoteParser = new RandomQuoteParser();
        $this->RandomQuoteGenerator = new RandomQuoteGenerator($this->RandomQuoteService, $this->RandomQuoteParser);
    }
    public function testThatRandomQuoteGeneratorClassExists(): void
    {
        $this->assertNotEmpty($this->RandomQuoteGenerator);
    }
    public function testRandomQuoteGeneratorIsAContentProvider(): void
    {
        $this->assertInstanceOf(ContentProviderInterface::class, $this->RandomQuoteGenerator);
    }
    public function testRandomQuoteGeneratorGeneratesCanGetOneSentence():void
    {
        $quote = $this->RandomQuoteGenerator->getOneSentence();
        preg_match_all('/[A-Z].*?[.!?]/s',$quote,$result);
        $this->assertSame(count($result[0]), 1);
    }

    public function testRandomQuoteServiceFetchesQuotes(): void
    {
        $quote = $this->RandomQuoteService->fetchAQuote();
        $this->assertIsString($quote);
    }
    public function testRandomQuoteGeneratorCanGetAFullQuoteWithName(): void
    {
        $quote = $this->RandomQuoteGenerator->getAQuote();
        $this->assertStringContainsString(RandomQuoteService::AUTHOR_PREFIX, $quote);
    }
    public function testRandomQuoteGeneratorCanGetAQuoteByTag(): void
    {
         $quote = $this->RandomQuoteGenerator->getAQuoteByTag('technology');
         $this->assertNotEmpty($quote);
    }
    public function testRandomQuoteGeneratorGivesAQuoteWhenGetContentCalled(): void
    {
        $this->assertIsString($this->RandomQuoteGenerator->getContent());
    }
}
