<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    <h3>Chess Board using Nested For Loop</h3>
    <table width="270px" cellspacing="0px" cellpadding="px" border="1px">
    
    <?php 
    // initialise first for loop for creating rows
    for ($x = 1; $x <= 8; $x++) {
        // html tag for row
        echo '<tr>';
        // initialise second for loop for creating cols
        for ($y = 1; $y <= 8; $y++) {
            //creating condition for cell shading
            $sum = $x + $y;
            $color = '#FFFFFF';

            if ($sum % 2 == 0) {
                // Even
                $color = '#FFFFFF';
            } else {
                // Odd
                $color = '#000000';
            }
            //html tag for populating columns
            echo "<td height=30px width=30px bgcolor=$color></td>";
            //close second for loop
        }
        // close html tag for row
        echo '</tr>';
        // close first for loop
    } ?>
    
</table>
   
</body>
</html>