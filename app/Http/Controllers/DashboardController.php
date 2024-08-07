<?php

namespace App\Http\Controllers;

use App\Models\Currency;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $currencies = Currency::all();

        $groupedCurrencies = $currencies->groupBy('shortCode')->map(function ($currency) {
            return $currency->sortBy('price')->first();
        });

        return view('currencies.dashboard', ['currencies' => $groupedCurrencies]);
    }
}
