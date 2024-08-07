<?php

namespace App\Services;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class SecondProviderService implements CurrencyProviderInterface
{

    /**
     * @throws Exception
     */
    public function getCurrencies()
    {
        $client = new Client();
        try {
            $response = $client->get('https://run.mocky.io/v3/5fc184ca-4cda-478e-81a3-6831584bcd6f');

            $res = json_decode($response->getBody()->getContents(), true);

            foreach ($res as $key => $item) {
                $res[$key] = [
                    'name' => $item['fullname'],
                    'symbol' => $item['symbl'],
                    'price' => $item['amount'],
                    'shortCode' => $item['shrtCode']
                ];
            }

            return $res;
        } catch (GuzzleException $e) {
            throw new Exception("Second provider isimli apiden bir yanıt alınamadı.");
        }
    }

    public function getProviderName(): string
    {
        return "ikinci-provider";
    }
}
