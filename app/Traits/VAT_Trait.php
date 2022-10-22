<?php

namespace App\Traits;

use App\Helpers\VAT_Helper;

trait VAT_Trait
{
    public function calcAddVatToAmount($vat_percentage, $amount): float|int
    {
        return $amount * (1 + $vat_percentage / 100);

        //or simple
        /*
         * calculate 20% tax on x-amount
         * ((20 % 100) * x-amount) + x-amount
         * */

        // Gross amount: 10.80
    }

    public function calcVatAddedValue($vat_percentage, $amount): float
    {
        $amount_including_vat = $this->calcAddVatToAmount($vat_percentage, $amount);

        return round($amount_including_vat - $amount, 2);

        // VAT added: 1.80
    }

    public function calcExcludeVatFromAmount($vat_percentage, $amount): float|int
    {
        return $amount - $amount / (1 + $vat_percentage / 100);

        // Net amount: 7.50
    }

    public function calcVatExcludedValue($vat_percentage, $amount): float|int
    {
        return $amount - $amount / (1 + $vat_percentage / 100);

        // VAT excluded: 1.50
    }
}
