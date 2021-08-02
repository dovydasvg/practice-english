<?php


namespace App\Components\RandomQuote;


use Illuminate\Contracts\Encryption\DecryptException;
use JsonException;

class RandomQuoteService
{

    public const QUOTEABLE_IO_API_URL = "https://api.quotable.io/random";
    public const AUTHOR_PREFIX = "BY ";

    public function fetchAQuote(): string
    {
        $content = $this->callAPI();
        $response = $this->decodeResponse($content);
        return $response["content"];
    }

    public function fetchAQuoteWithTheAuthor(): string
    {
        $content = $this->callAPI();
        $response = $this->decodeResponse($content);
        return $response["content"]. self::AUTHOR_PREFIX .$response["author"];
    }
    public function fetchAQuoteByTag(string $tag): string
    {
        $content = $this->callAPIWithTag($tag);
        $response = $this->decodeResponse($content);
        return $response["content"]. self::AUTHOR_PREFIX .$response["author"];
    }

    private function callAPI(): string
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, self::QUOTEABLE_IO_API_URL);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

    /**
     * @param string $content
     * @return mixed
     */
    public function decodeResponse(string $content): mixed
    {
        try {
            $response = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $e) {
            throw new DecryptException('Could not decript the data.', 0, $e);
        }
        return $response;
    }

    private function callAPIWithTag(string $tag): string
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, self::QUOTEABLE_IO_API_URL.'?tags='.$tag);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

}
