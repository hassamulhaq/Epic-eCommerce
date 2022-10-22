<?php

namespace App\Helpers;

class VAT_Helper
{
    const VAT_PERCENTAGE = 20; // 20%
    const VAT_AMOUNT = 1.20;
}

/*

https://vatcalconline.com/

formula:
Excluding VAT from gross sum:
VAT calculation formula for VAT exclusion is the following: to calculate VAT having the gross amount you should divide the gross amount by 1 + VAT percentage (i.e. if it is 15%, then you should divide by 1.15), then subtract the gross amount, multiply by -1 and round to the closest value (including eurocents). The last two operations are not mandatory since you see the VAT value even before you do them.
Adding VAT to net amount:
Easy deal. Simply multiply the net amount by 1 + VAT percentage (i.e. multiply by 1.15 if VAT is 15%) and you'll get the gross amount. Or multiply by VAT percentage to get the VAT value.
Read more about VAT tax on Wikipedia.

function calculatorSubmit() {
        var amount = getAmount();
        if (amount === false || isNaN(amount) || !isFinite(amount)) {
            return false;
        }
        var vat = getVat(); // 20% | 15%
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
