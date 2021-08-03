<?php

namespace Tests\Unit\RawContent;

use App\Components\OpenAi\OpenAiServices;
use App\Components\OpenAi\OpenAiTextGenerator;
use App\Domain\Content\Contracts\ContentProviderInterface;
use PHPUnit\Framework\TestCase;

class OpenAiTest extends TestCase
{

    private OpenAiTextGenerator $OpenAiGenerator;
    private OpenAiServices $OpenAiServices;

    public function setUp(): void
    {
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
        $this->assertIsString($this->OpenAiGenerator->getContent());
    }

}
