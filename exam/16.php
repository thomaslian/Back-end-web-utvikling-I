<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>
</head>
<body>
<?php

$parents = [
    ["name" => "Thomas Smith", "children" => array(
        ["name" => "Sam", "gender" => "male", "age" => 15],
        ["name" => "Julie", "gender" => "female", "age" => 12])
    ],
    ["name" => "Dwayne Johnson", "children" => array(
        ["name" => "Pauline", "gender" => "female", "age" => 6],
        ["name" => "Ariana", "gender" => "female", "age" => 13])
    ],
    ["name" => "Clarke Griffin", "children" => array(
        ["name" => "Madi", "gender" => "female", "age" => 11])
    ]
];

echo '<pre>'; print_r($parents); echo '</pre>';

foreach ($parents as $parent) {
    foreach ($parent["children"] as $child) {
        $typeOfChild = "";
        if ($child["gender"] == "female") {
            $typeOfChild = "daughter";
        } elseif ($child["gender"] == "male") {
            $typeOfChild = "son";
        }
        echo "<p>" . $child["name"] . ", aged " . $child["age"] . ", is the " . $typeOfChild . " of " . $parent["name"] . "</p>";
    }
}


?>
</body>
</html>