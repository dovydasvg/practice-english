<?php


namespace App\Components\RandomQuote;


class RandomQuoteService
{
    /**
     * @throws \JsonException
     */
    public function fetchAQuote()
    {
        $content = $this->callAPI();
        $response = json_decode($content, true, 512, JSON_THROW_ON_ERROR);
        return $response["content"];
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
