<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>
<body>
<?php

echo progressiveTaxSystem(15000);


function progressiveTaxSystem($preTaxIncome)
{
    $flatTaxRate = 0.05; // For all income
    $surplus1Rate = 0.10;
    $surplus2Rate = 0.15;
    $surplus3Rate = 0.20;
    $taxToPay = 0;

    if ($preTaxIncome > 0) {
        /*
         * It says first 10k is not taxed. But the flat rate is for all income.
         * I therefore assume that the first 10k is not surplus taxed, but the flat rate is still counted as it is for all income.
         */
        $taxToPay += $preTaxIncome * $flatTaxRate;
    }
    if ($preTaxIncome > 10000) {
        if (($preTaxIncome - 20000) > 0) {
            $taxToPay += $surplus1Rate * 10000;
        } else {
            $taxToPay += $surplus1Rate * ($preTaxIncome - 10000);
        }
    }
    if ($preTaxIncome >= 20000) {
        if (($preTaxIncome-30000) > 0) {
            $taxToPay += $surplus2Rate * 10000;
        } else {
            $taxToPay += $surplus2Rate * ($preTaxIncome - 20000);
        }
    }
    if ($preTaxIncome >= 30000) {
        $taxToPay += $surplus3Rate * ($preTaxIncome - 30000);
    }
    return $taxToPay;
}

?>
</body>
</html>