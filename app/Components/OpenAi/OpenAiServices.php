<?php


namespace App\Components\OpenAi;


use Error;
use Exception;

class OpenAiServices
{
    private const PROMPT = 'Give me back a sentence related to ';
    private const DAVINCI_API_URL = "https://api.openai.com/v1/engines/davinci/completions";

    public function fetchRandomSentence(): string
    {
        return $this->callAPI();
    }

    private function callAPI(string $keyword = 'love', int $max_tokens = 64): string
    {
        $request_body = [
            "prompt" => self::PROMPT.$keyword,
            "max_tokens" => $max_tokens,
            "temperature" => 0.7,
            "top_p" => 1,
            "presence_penalty" => 0.75,
            "frequency_penalty"=> 0.75,
            "best_of"=> 1,
            "stream" => false,
        ];
        $postfields = json_encode($request_body);
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => self::DAVINCI_API_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $postfields,
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'Authorization: Bearer ' . config('apikeys.openai')
            ],
        ]);
        $response = curl_exec($curl);
        $err = curl_error($curl);
        $response = json_decode($response);
        if(! empty($response->error)){
            throw new Exception('OpenAi returned an error: '.$response->error->message);
        }
        if ($err) {
            throw new Error('The API call returned an error: '.$err);
        } else {
            return $response->choices[0]->text;
        }
    }

    public function fetchASentenceByPrompt(string $prompt): string
    {
        return $this->callAPI($prompt);
    }
}
