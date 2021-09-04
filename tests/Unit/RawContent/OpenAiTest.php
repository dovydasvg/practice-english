<?php

namespace Tests\Unit\RawContent;

use App\Components\OpenAi\OpenAiServices;
use App\Components\OpenAi\OpenAiTextGenerator;
use App\Domain\Content\Contracts\ContentProviderInterface;
use Tests\TestCase;

class OpenAiTest extends TestCase
{

    private const PROMPT = 'Fantasy football being the best game ever.';
    private const MIN_PROMPT = 'football';
    private OpenAiTextGenerator $OpenAiGenerator;
    private OpenAiServices $OpenAiServices;

    public function setUp(): void
    {
        parent::setUp();
        $this->OpenAiServices = new OpenAiServices();
        $this->OpenAiGenerator = new OpenAiTextGenerator($this->OpenAiServices);
    }

    public function testThatOpenAiTextGeneratorClassExists(): void
    {
        $this->assertNotEmpty($this->OpenAiGenerator);
    }

    public function testThatOpenAiTextGeneratorIsAContentProvider(): void
    {
        $this->assertInstanceOf(ContentProviderInterface::class,$this->OpenAiGenerator);
    }

    public function testThatOpenAiTextGeneratorCanProvideSomeRandomContent(): void
    {
        $this->assertIsString($this->OpenAiGenerator->getRandomContent());
    }

    public function testThatOpenAiTextGeneratorCanGenerateTextBasedOnAPrompt(): void
    {
        $result = $this->OpenAiGenerator->getContentByPrompt(self::PROMPT);
        $this->assertStringContainsStringIgnoringCase(self::MIN_PROMPT,$result);
    }

}
