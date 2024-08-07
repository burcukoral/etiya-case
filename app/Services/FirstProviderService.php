<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class FirstProviderService implements CurrencyProviderInterface
{
    /**
     * @throws Exception
     */
    public function getCurrencies()
    {
        $client = new Client();
        try {
            $response = $client->get('https://run.mocky.io/v3/327890ae-7945-4322-baf0-966ec4ac51bd');

            return json_decode($response->getBody()->getContents(), true);
        } catch (GuzzleException $e) {
            throw new Exception("First provider isimli apiden bir yanıt alınamadı.");
        }
    }

    public function getProviderName(): string
    {
        return "ilk-provider";
    }
}
