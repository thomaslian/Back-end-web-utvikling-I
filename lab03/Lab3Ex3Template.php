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
        $temp[] = $input;
        $n = count($temp);
        $flag = 0;

        $x = 0; // i
        $y = 0; // j
        // implement bubblesort algorithm here, use while or do..while loops and/or break and continue statements
        while ($x < $n) {
            while ($y < $n - $x - 1) {
                if ($input[$y] > $input[$y + 1]) {
                    // Swap elements
                    $temp[] = $input[$y];
                    $input[$y] = $input[$y + 1];
                    $input[$y + 1] = $temp;
                    $flag = 1;
                }
                $y++;
            }
            $x++;
            if ($flag == 0) {
                break;
            }
        }

        // temp should be the sorted array
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