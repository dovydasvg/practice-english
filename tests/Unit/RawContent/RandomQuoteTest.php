<?php

namespace Tests\Unit\RawContent;

use App\Domain\Content\Contracts\ContentProviderInterface;
use PHPUnit\Framework\TestCase;
use App\Components\RandomQuote\RandomQuoteGenerator;

class RandomQuoteTest extends TestCase
{
    /**
     * @var RandomQuoteGenerator
     */
    private RandomQuoteGenerator $RandomQuoteGenerator;

    public function setUp(): void
    {
        $this->RandomQuoteGenerator = new RandomQuoteGenerator;
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

}
