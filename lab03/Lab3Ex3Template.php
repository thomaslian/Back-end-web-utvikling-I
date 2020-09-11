<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
    <?php
    // Algorithm for bubble sort
    function bubbleSort($input)
    {
        $temp = $input;

        while (true) {
            $endOfArray = false;
            $didSwap = false;
            $idx = 0;

            do {
                $x = $temp[$idx];
                $y = $temp[$idx + 1];

                if (is_null($y)) {
                    $endOfArray = true;
                    continue;
                }

                if ($y < $x) {
                    $temp[$idx] = $y;
                    $temp[$idx + 1] = $x;

                    $didSwap = true;
                }
                $idx++;
            } while ($endOfArray == false); // nested do...while loop

            if ($didSwap == false) {
                break;
            }
        } // first while loop

        return $temp;
    }

    // test your function with different input.
    $inputArray = [4, 5, 8, 2, 0, 1, 10];
    print_r($inputArray);
    echo '<br>';

    $sortedArray = bubbleSort($inputArray);
    echo 'Sorted Array : ';
    print_r($sortedArray);
    ?>
   
</body>
</html>