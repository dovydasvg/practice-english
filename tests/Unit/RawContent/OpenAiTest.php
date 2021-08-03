<?php

namespace Tests\Unit\RawContent;

use App\Components\OpenAi\OpenAiTextGenerator;
use App\Domain\Content\Contracts\ContentProviderInterface;
use PHPUnit\Framework\TestCase;

class OpenAiTest extends TestCase
{

    private OpenAiTextGenerator $OpenAiGenerator;

    public function setUp(): void
    {
        $this->OpenAiGenerator = new OpenAiTextGenerator();
    }

    public function testThatOpenAiTextGeneratorClassExists(): void
    {
        $this->assertNotEmpty($this->OpenAiGenerator);
    }

    public function testThatOpenAiTextGeneratorIsAContentProvider(): void
    {
        $this->assertInstanceOf(ContentProviderInterface::class,$this->OpenAiGenerator);
    }

}
