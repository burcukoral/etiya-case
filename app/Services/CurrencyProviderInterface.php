<?php

namespace App\Services;

interface CurrencyProviderInterface
{
    public function getCurrencies();

    public function getProviderName(): string;
}
