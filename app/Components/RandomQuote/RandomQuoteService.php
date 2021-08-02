<?php


namespace App\Components\RandomQuote;


use Illuminate\Contracts\Encryption\DecryptException;
use JsonException;

class RandomQuoteService
{

    public function fetchAQuote(): string
    {
        $content = $this->callAPI();
        try {
            $response = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
            return $response["content"];
        } catch (JsonException $e) {
            throw new DecryptException('Could not decript the data.', 0, $e);
        }
    }

    private function callAPI(): string
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "https://api.quotable.io/random");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($curl);
        curl_close($curl);
        return $output;
    }

}
