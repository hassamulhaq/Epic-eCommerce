<?php

namespace App\Helpers;

class CartHelper
{
    const DEFAULT_IS_ACTIVE = 1; // default value of cart

    const DEFAULT_CART_CURRENCY_CODE = '$';

    const VAT_PERCENTAGE = 0.20; // 20%
    const VAT_AMOUNT = 1.20;
}

/*

https://vatcalconline.com/

function calculatorSubmit() {
        var amount = getAmount();
        if (amount === false || isNaN(amount) || !isFinite(amount)) {
            return false;
        }
        var vat = getVat(); // 1.20 if 20% | 1.15 is 15%
        if (vat === false || isNaN(vat) || !isFinite(vat)) {
            return false;
        }
        var operation = getOperation();
        var result;
        if (operation === 'exclude') {
            result = amount - amount / (1 + vat / 100);
        } else if (operation === 'add') {
            result = amount * (1 + vat / 100);
        }
        addResults(amount, vat, operation, result);
    }
*/
