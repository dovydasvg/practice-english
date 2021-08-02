<?php

namespace Tests\Unit\RawContent;

use PHPUnit\Framework\TestCase;
use App\Components\RandomQuote\RandomQuoteGenerator;

class RandomQuoteTest extends TestCase
{
    /**
     * @var RandomQuoteGenerator
     */
    private $RandomQuoteGenerator;

    public function setUp(): void
    {
        $this->RandomQuoteGenerator = new RandomQuoteGenerator;
    }
    public function testThatRandomQuoteGeneratorClassExists(): void
    {
        $this->assertNotEmpty($this->RandomQuoteGenerator);
    }

}
