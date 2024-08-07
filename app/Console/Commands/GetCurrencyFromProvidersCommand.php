<?php

namespace App\Console\Commands;

use App\Models\Currency;
use App\Services\CurrencyProviderInterface;
use App\Services\FirstProviderService;
use App\Services\SecondProviderService;
use Illuminate\Console\Command;

class GetCurrencyFromProvidersCommand extends Command
{
    protected $signature = 'get:currency-from-providers';

    protected $description = 'Veri sağlayıcılardan para birimlerini çekmemizi sağlayan bir komut.';

    public function handle(): void
    {
        $providers = [
            new FirstProviderService(),
            new SecondProviderService(),
        ];


        foreach ($providers as $provider) {
            /** @var CurrencyProviderInterface $provider */
            $currencies = $provider->getCurrencies();

            foreach ($currencies as $currency) {
                $this->getOutput()->success($provider->getProviderName() . ' sınıfı üzerinden ' . $currency['name'] . ' para birimi güncellendi.');

                Currency::updateOrCreate([
                    'provider' => $provider->getProviderName(),
                    'shortCode' => $currency['shortCode']
                ], [
                    'name' => $currency['name'],
                    'symbol' => $currency['symbol'],
                    'price' => $currency['price']
                ]);
            }
        }
    }
}
