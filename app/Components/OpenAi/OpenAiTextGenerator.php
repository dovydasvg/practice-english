<?php


namespace App\Components\OpenAi;


use App\Domain\Content\Contracts\ContentProviderInterface;

class OpenAiTextGenerator implements ContentProviderInterface
{

    private OpenAiServices $services;

    public function __construct(OpenAiServices $services)
    {
        $this->services = $services;
    }

    public function getContent(): string
    {
        return $this->services->fetchRandomSentence();
    }
}
